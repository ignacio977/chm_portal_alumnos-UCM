<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_referencia');
            $table->string('rut')->unique();/*RUT de persona natural*/
            $table->foreign('id_referencia')->references('id')->on('users')->onDelete('cascade');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('tipo_ingreso');/*PSU, especial, etc.*/
            $table->date('fecha_ingreso');
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
        Schema::dropIfExists('alumnos');
    }
}
