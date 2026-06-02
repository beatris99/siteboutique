<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('selected_package_key')->nullable()->after('selected_category_label');
            $table->string('selected_package_name')->nullable()->after('selected_package_key');
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn([
                'selected_package_key',
                'selected_package_name',
            ]);
        });
    }
};
