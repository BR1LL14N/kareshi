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
        Schema::create('envoices', function (Blueprint $table) {
            $table->id();

            // Relasi ke rental (satu invoice untuk satu rental)
            $table->foreignId('rental_id')->constrained('rentals')->onDelete('cascade');

            // Total tagihan
            $table->decimal('total', 10, 2);

            // Metode pembayaran: transfer atau ewallet
            $table->enum('payment_method', ['transfer', 'ewallet'])->default('transfer');

            // Status pembayaran
            $table->enum('payment_status', ['pending', 'dbayar', 'gagal'])->default('pending');

            // Waktu pembayaran jika sudah dibayar
            $table->timestamp('paid_at')->nullable();

            // Catatan tambahan (opsional, seperti info rekening, bukti transfer manual, dll)
            $table->text('note')->nullable();

            // Referensi pembayaran dari e-wallet (kalau manual bisa diabaikan)
            $table->string('external_reference')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envoices');
    }
};
