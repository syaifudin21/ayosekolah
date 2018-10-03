<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jurusan');
            $table->integer('id_ta');
            $table->integer('id_tingkatan_kelas');
            $table->integer('id_guru')->nullable();
            $table->string('kelas');
            $table->string('deskripsi')->nullable();
            $table->string('tgl_buka')->nullable();
            $table->string('tgl_tutup')->nullable();
            $table->string('tgl_arsip')->nullable();
            $table->enum('status', ['Dibuka', 'Ditutup', 'Arsip'])->default('Ditutup');
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
        Schema::dropIfExists('kelas');
    }
}
