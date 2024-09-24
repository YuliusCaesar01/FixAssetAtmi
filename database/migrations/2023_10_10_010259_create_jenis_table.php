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
        Schema::create('jenis', function (Blueprint $table) {
            $table->increments('id_jenis');
            $table->unsignedInteger('id_kelompok');
            $table->string('nama_jenis_yayasan')->nullable();
            $table->string('nama_jenis_mikael')->nullable();
            $table->string('nama_jenis_politeknik')->nullable();

            $table->string('kode_jenis');  
            $table->timestamps();
            $table->foreign('id_kelompok')->references('id_kelompok')->on('kelompoks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis');
    }
};
