<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // id column, auto-incrementing primary key
            $table->string('keterangan'); // column for notification description
            $table->unsignedBigInteger('user_id'); // foreign key column for user
            $table->unsignedBigInteger('pengajuan_id'); // foreign key column for user
            $table->timestamp('tanggal_notif'); // column for notification date
            
            $table->timestamps(); // created_at and updated_at timestamps

            // Foreign key constraint
            $table->foreign('pengajuan_id')->references('id_permintaan_fa')->on('permintaan_fixed_assets');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}

