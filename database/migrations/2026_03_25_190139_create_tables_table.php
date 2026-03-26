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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('number'); // Nomor meja (misal: A1)
            $table->integer('capacity'); // Kapasitas orang
            $table->enum('status', ['available', 'occupied', 'reserved', 'maintenance'])->default('available');
            $table->boolean('is_active')->default(true); // Fitur On/Off Meja secara sistem
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
