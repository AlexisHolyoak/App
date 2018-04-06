<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $attributes = [
      'lunes' => false,
      'martes' => false,
      'miercoles' => false,
      'jueves' => false,
      'viernes' => false,
      'sabado' => false,
      'domingo' => false,
      'online' => false,
      'presencial' => false,
  ];
  public function group()
  {
      return $this->belongsTo('App\Group');
  }
}
