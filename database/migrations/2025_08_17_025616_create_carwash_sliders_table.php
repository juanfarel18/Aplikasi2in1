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
       Schema::create('carwash_sliders', function (Blueprint $table) {
    $table->id();
    $table->string('title')->nullable();
    $table->string('image_path')->nullable();
    $table->string('link')->nullable();
    $table->integer('order')->default(0);
    $table->boolean('status')->default(true);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carwash_sliders');
    }
};
