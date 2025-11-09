<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountTypeAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$types): Response
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }


        // get user types
        $userTypes = cache()->remember("user_types_{$user->id}", 3600, function () use ($user) {
            return $user->usertypes->pluck('user_type_name')->map(fn($name) => strtolower($name));
        });


        // Check if any of the user's types match the allowed types
        foreach ($types as $type) {
            if ($userTypes->contains(strtolower($type))) {
                return $next($request);
            }
        }
        // If none match, deny access
        return abort(403, 'You do not have permission to access this page.');
    }
}
