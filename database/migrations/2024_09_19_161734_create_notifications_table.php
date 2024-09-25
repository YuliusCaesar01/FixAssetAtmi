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
            $table->id('notif_id'); // Primary key
            $table->string('nama_notif'); // Name of the notification
            $table->enum('jenis_notif', ['email', 'dashboard', 'keduanya']); // Type of notification
            $table->unsignedBigInteger('id_asal')->nullable(); // Foreign key for the user
            $table->unsignedBigInteger('id_tujuan')->nullable();  // Foreign key for the role
            $table->unsignedBigInteger('id_pengajuan'); // Ensure this matches
            $table->dateTime('notif_periode'); // Notification period
            $table->dateTime('notif_expired'); // Notification expiration date
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraints
            $table->foreign('id_asal')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_tujuan')->references('id')->on('roles')->onDelete('cascade'); // Adjusted to reference roles
            $table->foreign('id_pengajuan')->references('id_permintaan_fa')->on('permintaan_fixed_assets')->onDelete('cascade');
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
