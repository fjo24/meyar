<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{

    public function handle($request, Closure $next)
    {
        if (auth()->user()->is_admin == 0) {
            return redirect()->route('denied');
        }

        return $next($request);
        
    }

    
}
