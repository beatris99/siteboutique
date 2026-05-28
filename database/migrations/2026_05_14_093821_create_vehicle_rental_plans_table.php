<?php

use App\Models\Vehicle;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicle_rental_plans', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Vehicle::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('label')->nullable();

            $table->enum('use_case', ['fun', 'delivery', 'both'])->default('both');

            $table->enum('duration_unit', ['hour', 'day', 'week', 'month'])->default('week');
            $table->unsignedInteger('duration_value')->default(1);

            $table->decimal('price', 10, 2)->nullable();
            $table->string('price_note')->nullable();

            $table->text('description')->nullable();

            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicle_rental_plans');
    }
};
