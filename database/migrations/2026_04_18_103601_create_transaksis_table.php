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
       Schema::create('transaksis', function (Blueprint $table) {
            $table->id();

            $table->string('nama_pelanggan');
            $table->enum('jenis_pesanan', ['dine-in','takeaway','delivery']);
            $table->dateTime('tanggal');

            $table->double('total')->default(0);

            $table->enum('metode_pembayaran', ['tunai','qris','transfer']);

            $table->foreignId('id_meja')
            ->nullable()
            ->constrained('mejas')
            ->nullOnDelete();

            $table->foreignId('id_user')
            ->constrained('users')
            ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
