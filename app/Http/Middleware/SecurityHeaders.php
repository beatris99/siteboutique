<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // In local/development nu punem CSP,
        // pentru ca Vite foloseste localhost / 127.0.0.1 / [::1]
        // si poate fi blocat usor.
        if (app()->environment('local')) {
            return $response;
        }

        $csp = implode(' ', [
            "default-src 'self';",
            "script-src 'self';",
            "script-src-elem 'self';",
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com;",
            "style-src-elem 'self' 'unsafe-inline' https://fonts.googleapis.com;",
            "font-src 'self' https://fonts.gstatic.com data:;",
            "img-src 'self' data: blob:;",
            "connect-src 'self';",
            "frame-ancestors 'self';",
            "base-uri 'self';",
            "form-action 'self';",
        ]);

        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}
