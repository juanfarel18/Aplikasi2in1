<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laundry_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('address');
            $table->date('booking_date');
            $table->time('booking_time')->nullable();
            $table->string('service_type'); // cuci kering, cuci setrika, dll
            $table->decimal('weight', 8, 2)->nullable(); // kg
            $table->decimal('price', 10, 2)->nullable();
            $table->string('status')->default('pending'); // pending, confirmed, completed
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laundry_bookings');
    }
};
