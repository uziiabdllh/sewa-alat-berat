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
        Schema::create('bookings', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('equipment_id')
                  ->references('id')
                  ->on('equipments')
                  ->cascadeOnDelete();

            $table->string('booking_code')->unique();

            $table->date('start_date');

            $table->date('end_date');

            $table->integer('duration');

            $table->text('project_location');

            $table->boolean('operator_needed')->default(false);

            $table->boolean('delivery_needed')->default(false);

            $table->decimal('subtotal',12,2);

            $table->decimal('tax',12,2);

            $table->decimal('total',12,2);

            $table->enum('status',[
                'pending',
                'approved',
                'rejected',
                'completed'
            ])->default('pending');

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
