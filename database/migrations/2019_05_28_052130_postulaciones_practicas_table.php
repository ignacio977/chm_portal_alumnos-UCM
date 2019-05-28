<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostulacionesPracticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulaciones_practicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('alumnoid')->unsigned();
            $table->bigInteger('practicaid')->unsigned();
            $table->date('fecha');
            $table->string('estado');
            $table->timestamps();
            $table->foreign('alumnoid')->references('id')->on('users');
            $table->foreign('practicaid')->references('id')->on('practicasprofesionales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
