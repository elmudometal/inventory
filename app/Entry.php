<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
  public function depot()
  {
      return $this->belongsTo('App\Depot');
  }
    public function products()
    {
        return $this->belongsToMany('App\Product','entry_details')->withPivot('amount', 'quantity');
    }
}
