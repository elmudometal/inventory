<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    public function tools(){
        return $this->belongsToMany('App\Tool','personal_tool')->withPivot('status', 'quantity');
    }
}
