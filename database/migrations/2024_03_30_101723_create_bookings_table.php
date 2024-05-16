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
            $table->string('number')->unique();
            $table->foreignId('guests_id')->constrained();
            $table->foreignId('tour_packages_id')->constrained();
            $table->integer('participant_count')->default(1);
            $table->dateTime('date');
            $table->enum('status', ['Waiting for Confirmation', 'Pending', 'Confirmed', 'Cancelled', 'Completed', 'Refunded'])->default('Waiting for Confirmation');

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
