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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');     // pemesan
            $table->foreignId('talent_id')->constrained('talents')->onDelete('cascade'); // talent yang dipilih
            $table->enum('status', ['pending', 'diterima', 'ditolak', 'selesai'])->default('pending');
            $table->text('catatan_user')->nullable();         // permintaan khusus dari user
            $table->text('catatan_talent')->nullable();       // respon dari talent (opsional)
            $table->dateTime('jadwal_pertemuan')->nullable(); // waktu bertemu
            $table->string('lokasi_pertemuan')->nullable();   // tempat bertemu
            $table->decimal('total_harga', 12, 2)->default(0);// total harga semua layanan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
