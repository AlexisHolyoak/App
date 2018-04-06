<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('dni');
            $table->string('email');
            $table->date('fechanacimiento');
            $table->string('direccion');
            $table->string('telefono')->nullable();
            $table->string('celular');
            $table->string('especialidad');
            $table->string('centrolaboral');
            $table->string('discapacidad')->nullable();
            $table->string('conexion');
            $table->string('comentarios')->nullable();
            $table->tinyInteger('estado')->default('1');
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
        Schema::dropIfExists('students');
    }
}
