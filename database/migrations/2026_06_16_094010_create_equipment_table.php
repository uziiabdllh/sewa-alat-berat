<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('code')->unique();
            $table->string('name');
            $table->string('brand');
            $table->year('year');

            $table->decimal('daily_price',12,2);

            $table->enum('status',[
                'available',
                'rented',
                'maintenance'
            ])->default('available');

            $table->string('image')->nullable();

            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipments');
    }
};
