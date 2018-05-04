<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    public function personals(){
        return $this->belongsToMany('App\Personal','personal_tool')->withPivot('status', 'quantity');
    }
}
