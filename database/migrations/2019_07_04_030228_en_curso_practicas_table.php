<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EnCursoPracticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_curso_practicas', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('alumnoid')->unsigned();
            $table->Integer('practicaid')->unsigned();
            $table->Integer('postulacionid')->unsigned();
            $table->date('fecha');
            $table->float('nota1');
            $table->float('nota2');
            $table->float('nota3');
            $table->string('estado')->default('EnCurso');
            $table->timestamps();
            $table->foreign('alumnoid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('practicaid')->references('id')->on('practicasprofesionales');
            $table->foreign('postulacionid')->references('id')->on('postulaciones_practicas')->onDelete('cascade');

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
