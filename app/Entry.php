<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
  public function depot()
  {
      return $this->belongsTo('App\Depot');
  }
}
