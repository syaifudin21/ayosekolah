<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tingkat_kelas');
            $table->integer('id_jenis_mapel');
            $table->integer('urutan')->nullable();
            $table->string('mapel');
            $table->string('deskripsi')->nullable();
            $table->enum('status', ['Show', 'Hidden'])->default('Show');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapels');
    }
}
