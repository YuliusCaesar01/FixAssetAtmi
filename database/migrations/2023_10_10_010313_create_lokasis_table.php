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
        Schema::create('lokasis', function (Blueprint $table) {
            $table->increments('id_lokasi');
            $table->string('nama_lokasi_yayasan')->nullable();
            $table->string('nama_lokasi_mikael')->nullable();
            $table->string('nama_lokasi_politeknik')->nullable();
            $table->string('keterangan_lokasi');
            $table->string('kode_lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasis');
    }
};
