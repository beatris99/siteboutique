<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('subscribers', 'unsubscribe_token')) {
            Schema::table('subscribers', function (Blueprint $table) {
                $table->string('unsubscribe_token', 80)->nullable()->unique()->after('discount_code');
            });
        }

        if (! Schema::hasColumn('subscribers', 'unsubscribed_at')) {
            Schema::table('subscribers', function (Blueprint $table) {
                $table->timestamp('unsubscribed_at')->nullable()->after('used_at');
            });
        }

        if (! Schema::hasColumn('subscribers', 'privacy_accepted_at')) {
            Schema::table('subscribers', function (Blueprint $table) {
                $table->timestamp('privacy_accepted_at')->nullable()->after('unsubscribed_at');
            });
        }

        if (! Schema::hasColumn('subscribers', 'last_sent_at')) {
            Schema::table('subscribers', function (Blueprint $table) {
                $table->timestamp('last_sent_at')->nullable()->after('privacy_accepted_at');
            });
        }
    }

    public function down(): void
    {
        foreach (['last_sent_at', 'privacy_accepted_at', 'unsubscribed_at', 'unsubscribe_token'] as $column) {
            if (Schema::hasColumn('subscribers', $column)) {
                Schema::table('subscribers', function (Blueprint $table) use ($column) {
                    $table->dropColumn($column);
                });
            }
        }
    }
};
