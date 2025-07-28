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
        Schema::create('penalties', function (Blueprint $table) {
            $table->id();
    
            // Pelaku pelanggaran
            $table->unsignedBigInteger('user_id'); // user yang dikenakan penalty
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Optional: terkait rental mana?
            $table->unsignedBigInteger('rental_id')->nullable();
            $table->foreign('rental_id')->references('id')->on('rentals')->onDelete('set null');

            // Informasi pelanggaran
            $table->string('alasan');              // misalnya: "tidak hadir", "melanggar perjanjian", dll
            $table->text('notes')->nullable();     // penjelasan tambahan jika perlu
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');

            // Optional: banding
            $table->boolean('ajukan_banding')->default(false);       // apakah user mengajukan banding?
            $table->text('alasan_banding')->nullable();            // alasan banding jika ada

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penalties');
    }
};
