<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egress extends Model
{
  public function depot()
  {
      return $this->belongsTo('App\Depot');
  }
  public function provider()
  {
      return $this->belongsTo('App\Personal');
  }
}
