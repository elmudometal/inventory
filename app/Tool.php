<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    public function Personals(){
        $this->belongsToMany('App\Personal');
    }
}
