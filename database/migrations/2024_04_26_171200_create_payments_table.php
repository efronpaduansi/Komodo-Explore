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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guests_id')->constrained();
            $table->foreignId('bookings_id')->constrained();
            $table->integer('total_price');
            $table->enum('payment_status', ['Unpaid', 'Paid', 'Partially Paid', 'Overdue', 'Cancelled'])->default('Unpaid');
            $table->enum('payment_method', ['Bank Transfer', 'Cash Payment'])->default('Bank Transfer');
            $table->dateTime('payment_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
