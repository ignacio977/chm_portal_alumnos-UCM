<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulacionesPracticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulaciones_practicas', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('alumnoid')->unsigned();
            $table->Integer('practicaid')->unsigned();
            $table->date('fecha');
            $table->string('estado');
            $table->dateTime('inspeccionado')->nullable();
            $table->timestamps();
            $table->foreign('alumnoid')->references('id')->on('users');
            $table->foreign('practicaid')->references('id')->on('practicasprofesionales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postulaciones_practicas');
    }
}
