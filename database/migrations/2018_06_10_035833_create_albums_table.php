<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('slug_album');
            $table->text('deskripsi')->nullable();
            $table->text('tgl_kegiatan')->nullable();
            $table->text('id_prestasi')->nullable();
            $table->enum('status_user', ['pengurus', 'pengajar', 'siswa']);
            $table->integer('id_user');
            $table->integer('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
