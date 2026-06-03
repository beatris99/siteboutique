<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('business_type')->nullable()->after('phone');
            $table->boolean('has_logo')->nullable()->after('business_type');
            $table->boolean('has_photos')->nullable()->after('has_logo');
            $table->boolean('has_domain')->nullable()->after('has_photos');
            $table->string('budget_range')->nullable()->after('has_domain');
            $table->string('urgency')->nullable()->after('budget_range');
            $table->date('launch_deadline')->nullable()->after('urgency');
            $table->string('source_page')->nullable()->after('launch_deadline');
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn([
                'business_type',
                'has_logo',
                'has_photos',
                'has_domain',
                'budget_range',
                'urgency',
                'launch_deadline',
                'source_page',
            ]);
        });
    }
};
