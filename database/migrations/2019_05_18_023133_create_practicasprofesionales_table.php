<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticasprofesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practicasprofesionales', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('EmpresaId');
            $table->string('DiasDesde');
            $table->string('DiasHasta');
            $table->string('HorasDesde');
            $table->string('HorasHasta');
            $table->string('Actividad1');
            $table->string('Actividad2');
            $table->string('Actividad3');
            $table->string('Actividad4');
            $table->string('PuestoOfrecido');
            $table->string('Enfoque');
            $table->string('Estado')->default('Pendiente');
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
        Schema::dropIfExists('practicasprofesionales');
    }
}
