<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $auth = false;

        foreach ($levels as $level) {
            if ($user->level == $level) {
                $auth = true;
                break;
            }
        }

        if ($auth) {
            Inertia::share('level', $level);
            return $next($request);
        }

        return abort(403);
    }
}
