<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            /**LOGIN**/
            $table->string('rut')->unique(); /*RUT de empresa o de persona natural*/
            $table->string('password');


            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->string('direccion_actual');
            $table->string('direccion_procedencia');
            $table->string('telefono');
            $table->string('celular');
            $table->string('foto')->default('');

            /*Solo Alumno*/
            $table->date('fecha_ingreso')->nullable();;

            /*Solo Profesor*/
            $table->string('cargo')->nullable();
            $table->string('departamento')->nullable();

            /*Otros*/
            $table->string('tipo_usuario'); /*estudiante, profesor, director, empresa, secretaria*/
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
