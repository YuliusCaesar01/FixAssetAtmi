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
        Schema::create('kelompoks', function (Blueprint $table) {
            $table->increments('id_kelompok');
            $table->unsignedInteger('id_tipe');
            $table->string('nama_kelompok_yayasan')->nullable();
            $table->string('nama_kelompok_mikael')->nullable();
            $table->string('nama_kelompok_politeknik')->nullable();
            $table->string('kode_kelompok');
            $table->timestamps();
            $table->foreign('id_tipe')->references('id_tipe')->on('tipes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompoks');
    }
};
