<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengumumansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengumumans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pengumuman');
            $table->string('slug_pengumuman');
            $table->Text('isi');
            $table->Text('lampiran')->nullable();
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->enum('status_user', ['Pengurus', 'Pengajar', 'Siswa']);
            $table->integer('id_user');
            $table->enum('objek', ['Umum', 'Kelas', 'Guru', 'Siswa', 'Siswa Baru'])->default('Umum');
            $table->integer('id_objek')->nullable();
            $table->integer('id_latih')->nullable();
            $table->enum('status', ['Tampil', 'Sembunyikan'])->default('Sembunyikan');
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
        Schema::dropIfExists('pengumumans');
    }
}
