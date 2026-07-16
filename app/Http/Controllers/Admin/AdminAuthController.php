<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    public function showLogin(
        Request $request
    ): View|RedirectResponse {
        $user = $request->user();

        if ($user?->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        if ($user !== null) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return view('admin.auth.login');
    }

    public function login(
        AdminLoginRequest $request
    ): RedirectResponse {
        $validated = $request->validated();

        $email = Str::lower(
            trim((string) $validated['email'])
        );

        $authenticated = Auth::attempt(
            [
                'email' => $email,
                'password' => $validated['password'],
                'is_admin' => true,
            ],
            false
        );

        if (! $authenticated) {
            return back()
                ->withErrors([
                    'email' => __(
                        'admin_auth.errors.invalid_credentials'
                    ),
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        $user = $request->user();

        if ($user !== null) {
            $user->forceFill([
                'last_login_at' => now(),
                'last_login_ip' => $request->ip(),
            ])->saveQuietly();
        }

        return redirect()->intended(
            route('admin.dashboard')
        );
    }

    public function logout(
        Request $request
    ): RedirectResponse {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
