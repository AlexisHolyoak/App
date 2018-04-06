<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('horas')->nullable()->default(0);
            $table->integer('dias')->nullable()->default(0);
            $table->time('horainicio')->nullable();
            $table->time('horaconclusion')->nullable();
            $table->boolean('lunes')->nullable()->default(0);
            $table->boolean('martes')->nullable()->default(0);
            $table->boolean('miercoles')->nullable()->default(0);
            $table->boolean('jueves')->nullable()->default(0);
            $table->boolean('viernes')->nullable()->default(0);
            $table->boolean('sabado')->nullable()->default(0);
            $table->boolean('domingo')->nullable()->default(0);
            $table->double('precio');
            $table->boolean('presencial')->nullable()->default(0);
            $table->boolean('online')->nullable()->default(0);
            $table->string('incluye')->nullable();
            $table->string('descripcion')->nullable();
            $table->binary('plantilla')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
