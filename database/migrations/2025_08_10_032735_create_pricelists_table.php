<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pricelists', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['laundry', 'carwash'])->default('laundry'); // tipe layanan
            $table->string('service_name'); // nama layanan, contoh: Cuci Kiloan, Wax Mobil
            $table->text('description')->nullable(); // deskripsi layanan opsional
            $table->decimal('price', 12, 2); // harga layanan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pricelists');
    }
};
