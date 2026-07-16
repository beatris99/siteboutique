<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('subscribers')) {
            Schema::create('subscribers', function (Blueprint $table): void {
                $table->id();
                $table->string('email')->unique();
                $table->string('locale', 2)->default('ro');
                $table->boolean('is_active')->default(true);
                $table->timestamp('subscribed_at')->nullable();
                $table->string('discount_code')->nullable()->unique();
                $table->unsignedTinyInteger('discount_percent')->default(10);
                $table->timestamp('discount_expires_at')->nullable();
                $table->timestamp('used_at')->nullable();
                $table->string('unsubscribe_token', 64)->nullable()->unique();
                $table->timestamp('unsubscribed_at')->nullable();
                $table->timestamp('privacy_accepted_at')->nullable();
                $table->timestamp('last_requested_at')->nullable();
                $table->timestamp('last_sent_at')->nullable();
                $table->unsignedInteger('request_count')->default(0);
                $table->string('source_page')->nullable();
                $table->timestamps();
            });

            return;
        }

        $this->addColumnIfMissing('locale', function (Blueprint $table): void {
            $table->string('locale', 2)->default('ro');
        });

        $this->addColumnIfMissing('is_active', function (Blueprint $table): void {
            $table->boolean('is_active')->default(true);
        });

        $this->addColumnIfMissing('subscribed_at', function (Blueprint $table): void {
            $table->timestamp('subscribed_at')->nullable();
        });

        $this->addColumnIfMissing('discount_code', function (Blueprint $table): void {
            $table->string('discount_code')->nullable();
        });

        $this->addColumnIfMissing('discount_percent', function (Blueprint $table): void {
            $table->unsignedTinyInteger('discount_percent')->default(10);
        });

        $this->addColumnIfMissing('discount_expires_at', function (Blueprint $table): void {
            $table->timestamp('discount_expires_at')->nullable();
        });

        $this->addColumnIfMissing('used_at', function (Blueprint $table): void {
            $table->timestamp('used_at')->nullable();
        });

        $this->addColumnIfMissing('unsubscribe_token', function (Blueprint $table): void {
            $table->string('unsubscribe_token', 64)->nullable();
        });

        $this->addColumnIfMissing('unsubscribed_at', function (Blueprint $table): void {
            $table->timestamp('unsubscribed_at')->nullable();
        });

        $this->addColumnIfMissing('privacy_accepted_at', function (Blueprint $table): void {
            $table->timestamp('privacy_accepted_at')->nullable();
        });

        $this->addColumnIfMissing('last_requested_at', function (Blueprint $table): void {
            $table->timestamp('last_requested_at')->nullable();
        });

        $this->addColumnIfMissing('last_sent_at', function (Blueprint $table): void {
            $table->timestamp('last_sent_at')->nullable();
        });

        $this->addColumnIfMissing('request_count', function (Blueprint $table): void {
            $table->unsignedInteger('request_count')->default(0);
        });

        $this->addColumnIfMissing('source_page', function (Blueprint $table): void {
            $table->string('source_page')->nullable();
        });

        if (Schema::hasColumn('subscribers', 'created_at')) {
            DB::table('subscribers')
                ->whereNull('subscribed_at')
                ->update(['subscribed_at' => DB::raw('created_at')]);

            DB::table('subscribers')
                ->whereNull('last_requested_at')
                ->update(['last_requested_at' => DB::raw('created_at')]);
        }

        DB::table('subscribers')
            ->where('request_count', 0)
            ->update(['request_count' => 1]);
    }

    public function down(): void {}

    private function addColumnIfMissing(string $column, callable $definition): void
    {
        if (Schema::hasColumn('subscribers', $column)) {
            return;
        }

        Schema::table('subscribers', $definition);
    }
};
