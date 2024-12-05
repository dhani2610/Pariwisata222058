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
        Schema::table('wisata_222058', function (Blueprint $table) {
            $table->integer('id_pengelola_222058')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wisata_222058', function (Blueprint $table) {
            $table->dropColumn('id_pengelola_222058');
        });
    }
};
