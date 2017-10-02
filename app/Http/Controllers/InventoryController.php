<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Depot;
use App\Product;
use App\Entry;
use App\EntryDetail;
use Carbon\Carbon;

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
}
