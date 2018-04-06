<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable = [
      'user_id','name','dni','email','fechanacimiento','direccion','telefono','celular','especialidad','centrolaboral','discapacidad','conexion','comentarios',
  ];
}
