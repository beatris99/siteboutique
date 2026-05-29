<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('selected_category_key')->nullable()->after('selected_template');
            $table->string('selected_category_label')->nullable()->after('selected_category_key');
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn([
                'selected_category_key',
                'selected_category_label',
            ]);
        });
    }
};
