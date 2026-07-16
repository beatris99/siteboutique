<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (
            app()->environment('production')
            && str_starts_with(
                (string) config('app.url'),
                'https://'
            )
        ) {
            URL::forceScheme('https');
        }

        RateLimiter::for(
            'contact',
            function (Request $request): array {
                return [
                    Limit::perMinute(5)
                        ->by($request->ip()),
                ];
            }
        );

        RateLimiter::for(
            'lang-switch',
            function (Request $request): array {
                return [
                    Limit::perMinute(20)
                        ->by($request->ip()),
                ];
            }
        );

        /*
         * Protecție pentru autentificarea administratorului:
         *
         * - maximum 5 încercări/minut pentru email + IP;
         * - maximum 20 încercări/oră pentru același IP.
         */
        RateLimiter::for(
            'admin-login',
            function (Request $request): array {
                $email = Str::lower(
                    trim(
                        (string) $request->input(
                            'email',
                            'missing-email'
                        )
                    )
                );

                $tooManyAttemptsResponse =
                    static function (
                        Request $request,
                        array $headers
                    ) {
                        return redirect()
                            ->route('admin.login')
                            ->withErrors([
                                'email' => __(
                                    'admin_auth.errors.too_many_attempts'
                                ),
                            ])
                            ->withInput(
                                $request->only('email')
                            )
                            ->withHeaders($headers);
                    };

                return [
                    Limit::perMinute(5)
                        ->by(
                            'admin-login-email:'
                                . $email
                                . '|'
                                . $request->ip()
                        )
                        ->response(
                            $tooManyAttemptsResponse
                        ),

                    Limit::perHour(20)
                        ->by(
                            'admin-login-ip:'
                                . $request->ip()
                        )
                        ->response(
                            $tooManyAttemptsResponse
                        ),
                ];
            }
        );
    }
}
