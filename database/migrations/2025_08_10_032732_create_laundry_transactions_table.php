<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laundry_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laundry_booking_id');
            $table->string('status')->default('pending'); // pending, completed, canceled
            $table->decimal('total_price', 10, 2);
            // hapus payment_method dan paid_at karena tidak ada payment
            $table->timestamps();

            $table->foreign('laundry_booking_id')
                  ->references('id')->on('laundry_bookings')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laundry_transactions');
    }
};
