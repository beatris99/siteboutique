<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminBasicAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $username = (string) config('admin.username');
        $password = (string) config('admin.password');

        $providedUsername = (string) ($request->getUser() ?? '');
        $providedPassword = (string) ($request->getPassword() ?? '');

        $isValid = $providedUsername !== ''
            && $providedPassword !== ''
            && hash_equals($username, $providedUsername)
            && hash_equals($password, $providedPassword);

        if (! $isValid) {
            return response('Authentication required.', 401, [
                'WWW-Authenticate' => 'Basic realm="Admin Area"',
            ]);
        }

        return $next($request);
    }
}
