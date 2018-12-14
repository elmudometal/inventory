<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Depot extends Model
{
    public function egresses(){
        $egresses = DB::table('egresses')
            ->join('egress_details', 'egresses.id', '=', 'egress_details.egress_id')
            ->where('depot_id','=',$this->id)
            ->selectRaw('sum(amount * quantity) as subtotal')
            ->get();

        return empty($egresses->subtotal) ? 0 : $egresses->subtotal;
    }
}
