<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_sala')->unsigned();
            $table->integer('bloque');
            $table->integer('estado');
            $table->date('fecha_ingreso');
            $table->date('fecha_salida');

            $table->foreign('id_sala')->references('id')->on('salas')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');



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
        Schema::dropIfExists('reserva');
    }
}
