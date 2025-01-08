<?php

// app/Http/Middleware/AffiliateMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliateMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('affiliate')->check()) {
            return redirect()->route('affiliate.login');
        }

        return $next($request);
    }
}