<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function entries($depot_id){
      $entries = DB::table('entries')
            ->join('entry_details', 'entries.id', '=', 'entry_details.entry_id')
            ->where('depot_id','=',$depot_id)
            ->where('product_id','=',$this->product_id)
            ->sum('quantity');
      return $entries;
    }
    public function egresses($depot_id){
      $egresses = DB::table('egresses')
            ->join('egress_details', 'egresses.id', '=', 'egress_details.egress_id')
            ->where('depot_id','=',$depot_id)
            ->where('product_id','=',$this->product_id)
            ->sum('quantity');
      return $egresses;
    }
    public function stock($depot_id){
      return $this->entries($depot_id)-$this->egresses($depot_id);
    }
    public function entriesMonth($depot_id,$month){
      $entries = DB::table('entries')
            ->join('entry_details', 'entries.id', '=', 'entry_details.entry_id')
            ->where('depot_id','=',$depot_id)
            ->where('product_id','=',$this->id)
            ->whereMonth('date',$month)
            ->sum('quantity');
      return $entries;
    }
    public function egressesMonth($depot_id,$month){
      $egresses = DB::table('egresses')
            ->join('egress_details', 'egresses.id', '=', 'egress_details.egress_id')
            ->where('depot_id','=',$depot_id)
            ->where('product_id','=',$this->id)
            ->whereMonth('date',$month)
            ->sum("quantity");
      return $egresses;
    }
    public function priceMonth($depot_id,$month){
      $price = DB::table('egresses')
            ->join('egress_details', 'egresses.id', '=', 'egress_details.egress_id')
            ->where('depot_id','=',$depot_id)
            ->where('product_id','=',$this->id)
            ->whereMonth('date',$month)
            ->orderBy('egresses.id',' DESC')
            ->select('amount')
            ->get();
            var_dump($price);
      //return $price;
    }
    public function entrys()
    {
        return $this->belongsToMany('App\Entry','entry_details', 'id', 'entry_id');
    }
}
