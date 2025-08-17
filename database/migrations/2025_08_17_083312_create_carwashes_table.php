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
        Schema::create('carwashes', function (Blueprint $table) {
            $table->id();
            $table->json('images')->nullable(); // simpan semua gambar + urutan
            
            // KOLOM BARU DITAMBAHKAN DI SINI
            $table->boolean('is_active')->default(true); // Untuk status aktif/tidak aktif
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carwashes');
    }
};