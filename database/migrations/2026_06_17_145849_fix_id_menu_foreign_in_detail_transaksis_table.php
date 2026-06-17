<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('detail_transaksis', function (Blueprint $table) {
            $table->dropForeign(['id_menu']);
            $table->unsignedBigInteger('id_menu')->nullable()->change();
            $table->foreign('id_menu')->references('id')->on('menus')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('detail_transaksis', function (Blueprint $table) {
            $table->dropForeign(['id_menu']);
            $table->unsignedBigInteger('id_menu')->nullable(false)->change();
            $table->foreign('id_menu')->references('id')->on('menus')->cascadeOnDelete();
        });
    }
};
