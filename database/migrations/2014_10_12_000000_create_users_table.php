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
            $table->bigIncrements('id');
            $table->string('rut')->unique();/*RUT de empresa o de persona natural*/
            $table->string('email')->unique();/*Toda entidad o persona natural debe tener email*/
            $table->string('tipo'); /*Alumno, profesor, director, empresa, secretaria*/
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
