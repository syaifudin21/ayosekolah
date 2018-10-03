<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEkstrakurikulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekstrakurikulers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('pembina')->nullable();
            $table->text('foto');
            $table->string('albums')->nullable();
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
        Schema::dropIfExists('ekstrakurikulers');
    }
}
