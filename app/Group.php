<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
  public function course(){
    return $this->hasOne('App\Course');
  }
}
