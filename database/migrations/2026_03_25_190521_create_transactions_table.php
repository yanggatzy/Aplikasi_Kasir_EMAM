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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            // RELASI
            $table->foreignId('user_id')->constrained(); // Admin/Kasir yang bertugas
            $table->foreignId('table_id')->nullable()->constrained(); // Kosong jika Take-away

            // DATA TRANSAKSI
            $table->string('invoice_number')->unique();
            $table->integer('total_price'); // Total yang harus dibayar

            // FITUR TUNAI & KEMBALIAN
            $table->integer('amount_received')->default(0); // Uang dari pelanggan
            $table->integer('change_amount')->default(0);  // Kembalian yang diberikan

            // STATUS & TIPE
            $table->enum('order_type', ['dine-in', 'take-away'])->default('dine-in');
            $table->enum('payment_method', ['cash', 'qris', 'transfer'])->default('cash');
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending');

            // CATATAN NOTA (Misal: "Atas nama Pak Yunus")
            $table->text('transaction_notes')->nullable();

            $table->timestamps();
        });

        // SEKALIAN BUAT TABEL DETAIL (Rincian Menu yang Dibeli)
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained()->onDelete('cascade');
            $table->foreignId('menu_id')->constrained();
            $table->integer('quantity');
            $table->integer('price'); // Harga saat kejadian transaksi
            $table->string('notes')->nullable(); // Catatan per item (Misal: "Gak pake nasi")
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('transaction_details');
    }
};
