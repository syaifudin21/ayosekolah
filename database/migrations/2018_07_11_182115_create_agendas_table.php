<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agenda');
            $table->date('waktu');
            $table->text('keterangan');
            $table->enum('status_tampil', ['Tampil', 'Sembunyikan'])->default('Tampil');
            $table->enum('status', ['Terlaksana','Setujui', 'Batal', 'Rencana'])->default('Rencana');
            $table->enum('status_public', ['Public', 'Kelas', 'Guru', 'Siswa', 'Organisasi'])->default('Public');
            $table->enum('status_user', ['Pengurus', 'Pengajar', 'Siswa']);
            $table->integer('id_user');
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
        Schema::dropIfExists('agendas');
    }
}
