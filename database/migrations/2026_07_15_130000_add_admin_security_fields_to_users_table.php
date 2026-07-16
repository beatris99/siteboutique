<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('users')) {
            throw new \RuntimeException(
                'Tabela users nu există. Rulează mai întâi migrările standard Laravel.'
            );
        }

        $addIsAdmin = ! Schema::hasColumn(
            'users',
            'is_admin'
        );

        $addLastLoginAt = ! Schema::hasColumn(
            'users',
            'last_login_at'
        );

        $addLastLoginIp = ! Schema::hasColumn(
            'users',
            'last_login_ip'
        );

        if (
            ! $addIsAdmin
            && ! $addLastLoginAt
            && ! $addLastLoginIp
        ) {
            return;
        }

        Schema::table(
            'users',
            function (Blueprint $table) use (
                $addIsAdmin,
                $addLastLoginAt,
                $addLastLoginIp
            ): void {
                if ($addIsAdmin) {
                    $table
                        ->boolean('is_admin')
                        ->default(false);
                }

                if ($addLastLoginAt) {
                    $table
                        ->timestamp('last_login_at')
                        ->nullable();
                }

                if ($addLastLoginIp) {
                    $table
                        ->string('last_login_ip', 45)
                        ->nullable();
                }
            }
        );
    }

    public function down(): void
    {
        if (! Schema::hasTable('users')) {
            return;
        }

        $columns = [];

        foreach (
            [
                'is_admin',
                'last_login_at',
                'last_login_ip',
            ] as $column
        ) {
            if (Schema::hasColumn('users', $column)) {
                $columns[] = $column;
            }
        }

        if ($columns === []) {
            return;
        }

        Schema::table(
            'users',
            function (Blueprint $table) use (
                $columns
            ): void {
                $table->dropColumn($columns);
            }
        );
    }
};
