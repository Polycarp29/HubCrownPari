<?php

namespace App\Services\Backups;

use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\RequestException;


class SupaBase
{
    protected $client;

    public function __construct()
    {
        $supaBaseUrl = rtrim(env('SUPABASE_URL'), '/');
        $supaBaseKey = env('SUPABASE_SERVICE_KEY');

        $this->client = new Client([
            'base_uri' => $supaBaseUrl,
            'timeout'  => 30.0,
            'headers'  => [
                'apikey'        => $supaBaseKey,
                'Authorization' => 'Bearer ' . $supaBaseKey,
                'Content-Type'  => 'application/json',
                'Prefer'        => 'return=representation',
            ]
        ]);
    }


    /**
     * Dynamically access a table
     * Example: $supa->users()->select([...])
     */
    public function __call($table, $args)
    {
        return new SupaBaseTable($this->client, $table);
    }


    public function runMigration(string $sql, ?string $fileName = null)
    {
        try {
            $response = $this->client->post('/rest/v1', [
                'json' => ['query' => $sql],
            ]);

            $result = [
                'success' => true,
                'data'    => json_decode($response->getBody()->getContents(), true),
            ];

            Log::info('Supabase migration successful', [
                'file' => $fileName,
                'preview' => Str::limit(trim($sql), 100),
            ]);

            return $result;
        } catch (RequestException $e) {
            $responseBody = $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null;

            Log::error('Supabase SQL migration error', [
                'file' => $fileName,
                'error' => $e->getMessage(),
                'sql'   => Str::limit(trim($sql), 150),
                'response' => $responseBody,
            ]);

            return [
                'success' => false,
                'error'   => $e->getMessage(),
                'response' => $responseBody,
            ];
        }
    }


    /**
     * Run all migration files from a given folder
     */
    public function runMigrationsFromFolder(string $path): array
    {
        $results = [];

        if (!is_dir($path)) {
            Log::warning("Supabase migration path not found: {$path}");
            return ['success' => false, 'error' => 'Migration path not found'];
        }

        $files = glob($path . '/*.sql');

        if (empty($files)) {
            Log::info("No Supabase migrations found in: {$path}");
            return ['success' => true, 'message' => 'No migrations to run'];
        }

        Log::info("Running Supabase migrations", ['count' => count($files)]);

        foreach ($files as $file) {
            $sql = file_get_contents($file);
            $results[basename($file)] = $this->runMigration($sql, basename($file));
        }

        Log::info("Supabase migrations complete");

        return $results;
    }
}


class SupaBaseTable
{
    protected $client;
    protected $table;

    public function __construct(Client $client, string $table)
    {
        $this->client = $client;
        $this->table  = $table;
    }

    /** Insert rows */
    public function insert(array $data): array
    {
        if (array_keys($data) !== range(0, count($data) - 1)) {
            $data = [$data];
        }
        return $this->request('post', ['json' => $data]);
    }

    /** Select rows */
    public function select(array $params = []): array
    {
        $query = [
            'select' => isset($params['columns'])
                ? implode(',', $params['columns'])
                : '*',
        ];
        unset($params['columns']);
        $query = array_merge($query, $params);

        return $this->request('get', ['query' => $query]);
    }

    /** Update rows */
    public function update(array $params): array
    {
        if (!isset($params['data'])) {
            return ['success' => false, 'error' => 'Update requires data'];
        }

        $data = $params['data'];
        unset($params['data']);

        return $this->request('patch', [
            'query' => $params,
            'json'  => $data,
        ]);
    }

    /** Delete rows */
    public function delete(array $params): array
    {
        return $this->request('delete', ['query' => $params]);
    }

    /** Core request */
    protected function request(string $method, array $options): array
    {
        try {
            $response = $this->client->request($method, "/rest/v1/{$this->table}", $options);

            return [
                'success' => true,
                'data'    => json_decode($response->getBody()->getContents(), true),
            ];
        } catch (RequestException $e) {
            $responseBody = $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null;

            Log::error('Supabase request error', [
                'table'    => $this->table,
                'method'   => $method,
                'options'  => $options,
                'error'    => $e->getMessage(),
                'response' => $responseBody,
            ]);

            return [
                'success' => false,
                'error'   => $e->getMessage(),
                'response' => $responseBody,
            ];
        }
    }
}
