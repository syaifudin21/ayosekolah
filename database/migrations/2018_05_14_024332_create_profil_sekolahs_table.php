<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_sekolahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sekolah');
            $table->string('nama_sekolah');
            $table->string('nama_singkat_sekolah');
            $table->text('logo');
            $table->string('npsn')->nullable();
            $table->enum('jenjang',['SD', 'MI', 'SMP', 'MTs', 'SMA', 'SMK', 'MA']);
            $table->enum('status',['Negeri', 'Swasta']);
            $table->string('alamat');
            $table->string('kode_pos');
            $table->string('maps')->nullable();
            $table->string('sk')->nullable();
            $table->string('sk_izin')->nullable();
            $table->string('tgl_sk')->nullable();
            $table->enum('status_kepemilikan',['Negeri', 'Yayasan', 'Swasta']);
            $table->string('luastanah_milik')->nullable();
            $table->string('luastanah_bukan')->nullable();
            $table->string('nama_wajib_pajak')->nullable();
            $table->string('npwp')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('no_fax')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->enum('waktu_sekolah', ['Pagi', 'Siang', 'Pagi & Siang'])->default('Pagi');
            $table->string('menerima_bos')->nullable();
            $table->string('sertifikasi_iso')->nullable();
            $table->string('sumber_listrik')->nullable();
            $table->string('daya_listrik')->nullable();
            $table->string('akses_internet')->nullable();
            $table->string('kepala_sekolah')->nullable();
            $table->string('akriditasi')->nullable();
            $table->enum('kurikulum', ['KTSP 2006', 'Kurikulum 2013'])->nullable();
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
        Schema::dropIfExists('profil_sekolahs');
    }
}
