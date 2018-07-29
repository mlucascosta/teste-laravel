<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintegraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sintegra', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
            $table->string('cnpj',16);
            $table->text('json');
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
        Schema::drop('sintegra');
    }
}
