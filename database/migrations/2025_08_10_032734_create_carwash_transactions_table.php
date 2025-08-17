<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carwash_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
                  ->constrained('carwash_bookings')
                  ->onDelete('cascade');
            $table->string('status')->default('pending'); // pending, selesai, batal
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carwash_transactions');
    }
};
