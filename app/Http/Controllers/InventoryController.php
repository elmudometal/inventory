<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Depot;
use App\Product;
use App\Entry;
use App\EntryDetail;
use Carbon\Carbon;
use App\User;
use App\Personal;
use App\Egress;
use App\EgressDetail;

class InventoryController extends Controller
{
    //
    public function depot()
    {
        $data['depots'] = Depot::all();
        return view('depot.list', $data);
    }
    public function depotAdd()
    {
        return view('depot.add');
    }
    public function depotNew( Request $values )
    {
    	$depot= new Depot;
    	$depot->description = $values->description;
    	$depot->type = $values->type;
    	$depot->save();
    	return redirect()->action('InventoryController@depot');
    }
    public function depotProduct($depot_id)
    {
        $data['products'] = Product::all();
        $data['depots'] = Depot::find($depot_id);
        return view('depot.products', $data);
    }
    public function product()
    {
        $data['products'] = Product::all();
        return view('product.list', $data);
    }
    public function productAdd()
    {
        return view('product.add');
    }
    public function productNew(Request $values)
    {
      $product = new Product;
      $product->identifier = $values->identifier;
      $product->description = $values->description;
      $product->min = $values->min;
      $product->max = $values->max;
      $product->price = $values->price;
      $product->type = $values->type;
      $product->save();
      return redirect()->action('InventoryController@product');
    }
    public function entryAdd()
    {
      $data['personals'] = Personal::all();
      $data['products'] = Product::all();
      $data['depots'] = Depot::all();
      return view('inventory.entry', $data);
    }
    public function entryNew(Request $values)
    {
      $entry = new Entry;
      $entry->date = Carbon::now();
      $entry->provider_id = $values->provider;
      $entry->depot_id = $values->depot;
      $entry->save();
      foreach ($values->idarticulo as $key => $product) {
        $detail = new EntryDetail;
        $detail->product_id = $values->idarticulo[$key];
        $detail->quantity = $values->cantidad[$key];
        $detail->amount = $values->precio[$key];
        $detail->entry_id = $entry->id;
        $detail->save();
      }

        return redirect()->action('InventoryController@entry');
    }
    public function entry()
    {
      $data['entries'] =  Entry::all();
        return view('inventory.entry_list',$data);
    }
    public function egressAdd()
    {
      $data['personals'] = Personal::all();
      $data['products'] = Product::all();
      $data['depots'] = Depot::all();
      return view('inventory.egress', $data);
    }
    public function egressNew(Request $values)
    {
      $egress = new Egress;
      $egress->date = Carbon::now();
      $egress->provider_id = $values->provider;
      $egress->depot_id = $values->depot;
      $egress->user_id = \Auth::user()->id;
      $egress->save();
      foreach ($values->idarticulo as $key => $product) {
        $detail = new EgressDetail;
        $detail->product_id = $values->idarticulo[$key];
        $detail->quantity = $values->cantidad[$key];
        $detail->amount = $values->precio[$key];
        $detail->egress_id = $egress->id;
        $detail->save();
      }
        return redirect()->action('InventoryController@entry');
    }
    public function egress()
    {
      $data['egresses'] =  Egress::all();
        return view('inventory.egress_list',$data);
    }
    public function users()
    {
      $data['users'] =  User::all();
        return view('personal.users',$data);
    }
    public function personals()
    {
      $data['personals'] =  Personal::all();
        return view('personal.list',$data);
    }
    public function personal()
    {
        return view('personal.personal');
    }
    public function personalNew(Request $values)
    {
      $personal = new Personal;
      $personal->rut = $values->rut;
      $personal->fullname = $values->fullname;
      $personal->email = $values->email;
      $personal->role_id = $values->role_id;
      $personal->save();
      return redirect()->action('InventoryController@personals');
    }
}
