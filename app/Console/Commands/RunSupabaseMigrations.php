<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Backups\SupaBase;
use Illuminate\Support\Facades\File;

class RunSupabaseMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'supabase:migrate {--path= : Optional path to SQL migration folder}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run all Supabase SQL migrations from a folder via the SupaBase API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $path = $this->option('path') ?? database_path('migrations/supabase');

        if (!File::isDirectory($path)) {
            $this->error("Migration folder not found: {$path}");
            return self::FAILURE;
        }

        $this->info("Running Supabase migrations from: {$path}");

        $supa = new SupaBase();
        $results = $supa->runMigrationsFromFolder($path);

        if (isset($results['error'])) {
            $this->error("Migration error: " . $results['error']);
            return self::FAILURE;
        }

        // Display results in table format
        $rows = [];
        foreach ($results as $file => $result) {
            $rows[] = [
                'File' => $file,
                'Status' => $result['success'] ? 'Success' : 'Failed',
                'Message' => $result['success']
                    ? (is_array($result['data']) ? 'Executed' : 'Done')
                    : ($result['error'] ?? 'Unknown Error'),
            ];
        }

        $this->table(['File', 'Status', 'Message'], $rows);
        $this->info('Supabase migrations complete.');

        return self::SUCCESS;
    }
}
