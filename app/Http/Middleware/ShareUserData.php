<?php

namespace App\Http\Middleware;

use App\Models\BookCategory;
use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShareUserData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $bookCategories = BookCategory::get(['id', 'kategori_buku']);
        Inertia::share('kategoriBuku', $bookCategories);

        return $next($request);
    }
}
