<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class Internationalization
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = explode(',', $request->server('HTTP_ACCEPT_LANGUAGE'))[0];

        if (!empty($locale)) {
            App::setLocale(Str::lower($locale));
        }

        return $next($request);
    }
}
