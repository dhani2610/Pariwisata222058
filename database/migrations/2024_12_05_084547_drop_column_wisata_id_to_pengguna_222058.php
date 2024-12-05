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
        Schema::table('pengguna_222058', function (Blueprint $table) {
            $table->dropColumn('id_wisata_222058');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengguna_222058', function (Blueprint $table) {
            $table->integer('id_wisata_222058')->nullable();
        });
    }
};
