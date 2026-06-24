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

        if (app()->environment('local')) {
            return $response;
        }

        $csp = implode(' ', [
            "default-src 'self';",
            "script-src 'self' 'unsafe-inline' https://www.googletagmanager.com https://connect.facebook.net https://www.clarity.ms https://scripts.clarity.ms;",
            "script-src-elem 'self' 'unsafe-inline' https://www.googletagmanager.com https://connect.facebook.net https://www.clarity.ms https://scripts.clarity.ms;",
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com;",
            "style-src-elem 'self' 'unsafe-inline' https://fonts.googleapis.com;",
            "font-src 'self' https://fonts.gstatic.com data:;",
            "img-src 'self' data: blob: https://www.facebook.com https://connect.facebook.net https://*.clarity.ms https://c.bing.com;",
            "connect-src 'self' https://www.google-analytics.com https://region1.google-analytics.com https://analytics.google.com https://stats.g.doubleclick.net https://www.googletagmanager.com https://connect.facebook.net https://www.facebook.com https://www.clarity.ms https://*.clarity.ms https://c.bing.com;",
            "frame-ancestors 'self';",
            "base-uri 'self';",
            "form-action 'self';",
        ]);

        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}
