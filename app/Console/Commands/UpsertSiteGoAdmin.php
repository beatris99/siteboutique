<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class UpsertSiteGoAdmin extends Command
{
    protected $signature = 'sitego:admin
        {--email= : Adresa de email a administratorului}
        {--name= : Numele administratorului}';

    protected $description =
    'Creează sau actualizează contul de administrator SiteGo';

    public function handle(): int
    {
        $email = Str::lower(
            trim(
                (string) (
                    $this->option('email')
                    ?: config('admin.email')
                )
            )
        );

        $name = trim(
            (string) (
                $this->option('name')
                ?: config('admin.name')
            )
        );

        if ($email === '') {
            $email = Str::lower(
                trim(
                    (string) $this->ask(
                        __('admin_auth.command.email_prompt')
                    )
                )
            );
        }

        if ($name === '') {
            $name = trim(
                (string) $this->ask(
                    __('admin_auth.command.name_prompt')
                )
            );
        }

        $password = (string) $this->secret(
            __('admin_auth.command.password_prompt')
        );

        $passwordConfirmation = (string) $this->secret(
            __('admin_auth.command.password_confirmation_prompt')
        );

        if ($password !== $passwordConfirmation) {
            $this->error(
                __('admin_auth.command.passwords_do_not_match')
            );

            return self::FAILURE;
        }

        $validator = Validator::make(
            [
                'email' => $email,
                'name' => $name,
                'password' => $password,
            ],
            [
                'email' => [
                    'required',
                    'email:rfc',
                    'max:254',
                ],
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],
                'password' => [
                    'required',
                    Password::min(12)
                        ->mixedCase()
                        ->numbers()
                        ->symbols(),
                ],
            ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        $user = User::query()->firstOrNew([
            'email' => $email,
        ]);

        $wasExistingUser = $user->exists;

        $user->forceFill([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'is_admin' => true,
            'email_verified_at' =>
            $user->email_verified_at ?? now(),
        ]);

        $user->save();

        $this->info(
            $wasExistingUser
                ? __('admin_auth.command.updated')
                : __('admin_auth.command.created')
        );

        $this->line(
            __('admin_auth.command.account_email', [
                'email' => $email,
            ])
        );

        return self::SUCCESS;
    }
}
