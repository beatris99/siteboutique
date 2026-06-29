<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('subscribers')) {
            Schema::create('subscribers', function (Blueprint $table) {
                $table->id();
                $table->string('email')->unique();
                $table->string('locale', 5)->default('ro');
                $table->boolean('is_active')->default(true);
                $table->string('unsubscribe_token')->nullable()->unique();
                $table->string('discount_code')->nullable()->unique();
                $table->unsignedTinyInteger('discount_percent')->default(10);
                $table->timestamp('discount_expires_at')->nullable();
                $table->timestamp('discount_used_at')->nullable();
                $table->timestamp('subscribed_at')->nullable();
                $table->timestamp('unsubscribed_at')->nullable();
                $table->timestamps();
            });

            return;
        }

        Schema::table('subscribers', function (Blueprint $table) {
            if (! Schema::hasColumn('subscribers', 'locale')) {
                $table->string('locale', 5)->default('ro')->after('email');
            }

            if (! Schema::hasColumn('subscribers', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('locale');
            }

            if (! Schema::hasColumn('subscribers', 'unsubscribe_token')) {
                $table->string('unsubscribe_token')->nullable()->unique()->after('is_active');
            }

            if (! Schema::hasColumn('subscribers', 'discount_code')) {
                $table->string('discount_code')->nullable()->unique()->after('unsubscribe_token');
            }

            if (! Schema::hasColumn('subscribers', 'discount_percent')) {
                $table->unsignedTinyInteger('discount_percent')->default(10)->after('discount_code');
            }

            if (! Schema::hasColumn('subscribers', 'discount_expires_at')) {
                $table->timestamp('discount_expires_at')->nullable()->after('discount_percent');
            }

            if (! Schema::hasColumn('subscribers', 'discount_used_at')) {
                $table->timestamp('discount_used_at')->nullable()->after('discount_expires_at');
            }

            if (! Schema::hasColumn('subscribers', 'subscribed_at')) {
                $table->timestamp('subscribed_at')->nullable()->after('discount_used_at');
            }

            if (! Schema::hasColumn('subscribers', 'unsubscribed_at')) {
                $table->timestamp('unsubscribed_at')->nullable()->after('subscribed_at');
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('subscribers')) {
            return;
        }

        Schema::table('subscribers', function (Blueprint $table) {
            foreach ([
                         'locale',
                         'is_active',
                         'unsubscribe_token',
                         'discount_code',
                         'discount_percent',
                         'discount_expires_at',
                         'discount_used_at',
                         'subscribed_at',
                         'unsubscribed_at',
                     ] as $column) {
                if (Schema::hasColumn('subscribers', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
