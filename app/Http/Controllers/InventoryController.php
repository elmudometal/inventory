<?php

namespace App\Http\Controllers;

use App\Tool;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function depot()
    {
        $data['depots'] = Depot::all();
        return view('depot.list', $data);
    }

    public function depotAdd()
    {
        return view('depot.add');
    }

    public function depotNew(Request $values)
    {
        $depot = new Depot;
        $depot->name = $values->name;
        $depot->type = $values->type;
        $depot->adress = $values->adress;
        $depot->nproject = $values->nproject;
        $depot->supervisor = $values->supervisor;
        $depot->save();
        return redirect()->action('InventoryController@depot');
    }
    public function depotEdit($id)
    {
        $data['depot'] = Depot::find($id);
        return view('depot.edit', $data);
    }
    public function depotDelete($id)
    {
        $depot = Depot::find($id);
        $depot->delete();
        return redirect()->action('InventoryController@depot');
    }

    public function depotUpdate(Request $values)
    {
        $depot = Depot::find($values->id);
        $depot->name = $values->name;
        $depot->type = $values->type;
        $depot->adress = $values->adress;
        $depot->nproject = $values->nproject;
        $depot->supervisor = $values->supervisor;
        $depot->save();
        return redirect()->action('InventoryController@depot');
    }

    public function depotProduct($depot_id)
    {
        $data['products'] = new Product();
        $data['products'] =  $data['products']
            ->join('entry_details', 'products.id', '=', 'product_id')
            ->join('entries', 'entries.id', '=', 'entry_id')
            ->where('depot_id','=',$depot_id)->get();
        //dd($data['products']);
        $data['depots'] = Depot::find($depot_id);
        return view('depot.products', $data);
    }

    public function product($tipo=null)
    {
        if(!is_null($tipo)){
            $data['products'] = Product::Where('type','=',$tipo)->get();
        }else {
            $data['products'] = Product::all();
        }
        return view('product.list', $data);
    }

    public function productAdd()
    {
        return view('product.add');
    }

    public function productEdit()
    {
        return view('product.edit');
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
        return redirect()->action('InventoryController@product', array('id'=>$product->type));
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
        $entry->nroorden = $values->nroorden;
        $entry->nrofactura = $values->nrofactura;
        $entry->fechafactura = $values->fechafactura;
        $entry->provider_id = $values->provider;
        $entry->depot_id = $values->depot;
        $entry->save();
        foreach ($values->idarticulo as $key => $product) {
            $detail = new EntryDetail;
            $detail->product_id = $values->idarticulo[$key];

            if($values->idarticulo[$key] == 'x'){
                $product = new Product;
                $product->identifier = '_';
                $product->description = $values->description[$key];
                $product->min = 1;
                $product->max = $values->cantidad[$key];
                $product->price = $values->precio[$key];
                $product->type = 1;
                $product->save();
                $detail->product_id = $product->id;
            }

            $detail->quantity = $values->cantidad[$key];
            $detail->amount = $values->precio[$key];
            $detail->entry_id = $entry->id;
            $detail->save();
        }

        return redirect()->action('InventoryController@entry');
    }

    public function entry()
    {
        $data['entries'] = Entry::all();
        return view('inventory.entry_list', $data);
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
        $data['egresses'] = Egress::all();
        return view('inventory.egress_list', $data);
    }

    public function users()
    {
        $data['users'] = User::all();
        return view('personal.users', $data);
    }

    public function personals()
    {
        $data['personals'] = Personal::all();
        return view('personal.list', $data);
    }

    public function providers()
    {
        $data['personals'] = Personal::where('role_id', '=', '1')->get();
        $data['type'] = 'Proveedor';
        return view('personal.list', $data);
    }
    public function workers($role_id = 3)
    {
        $workers =array('3' => 'Maestro','4' => 'Ayudantes', '5' => 'Electricos');
        $data['personals'] = Personal::where('role_id', '=', $role_id)->get();
        $data['type'] = $workers[$role_id];
        $data['role'] = $role_id;
        return view('box.personal.list', $data);
    }

    public function worker($role_id)
    {
        $workers =array('1' => 'Proveedor','2' => 'Personal', '3' => 'Maestro','4' => 'Ayudantes', '5' => 'Electricos');
        $data['type'] = $workers[$role_id];
        $data['role'] = $role_id;
        return view('box.personal.personal',$data);
    }

    public function workerEdit($id)
    {
        $workers =array('1' => 'Proveedor','2' => 'Personal', '3' => 'Maestro','4' => 'Ayudantes', '5' => 'Electricos');
        $personal = new Personal;
        $personal = $personal->find($id);
        $data['personal'] = $personal;
        $data['type'] = $workers[$personal->role_id];
        $data['role'] = $personal->role_id;
        return view('box.personal.edit', $data);
    }

    public function workerSetEdit(Request $values)
    {
        $personal = new Personal;
        $personal = $personal->find($values->id);
        $personal->rut = $values->rut;
        $personal->fullname = $values->fullname;
        $personal->email = $values->email;
        $personal->role_id = $values->role_id;
        $personal->phone = $values->phone;
        $personal->adress = $values->adress;
        $personal->save();
        if ($values->role_id == 1) {
            return redirect()->action('InventoryController@providers');
        } if ($values->role_id >= 2 AND $values->role_id <= 5) {
        return redirect()->action('InventoryController@workers',array('role_id'=> $values->role_id));
        }else {
            return redirect()->action('InventoryController@personals');
        }
    }

    public function boxes($personal_id)
    {
        $personal = new Personal;
        $tools = new Tool;
        $data['tools'] = $tools->all();
        $data['personal_id'] = $personal_id;
        return view('box.list', $data);
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
        $personal->phone = $values->phone;
        $personal->adress = $values->adress;
        $personal->save();
        if ($values->role_id == 1) {
            return redirect()->action('InventoryController@providers');
        }
        elseif ($values->role_id >= 2 AND $values->role_id <= 5) {
            return redirect()->action('InventoryController@workers',array('role_id'=> $values->role_id));
        }
        else {
            return redirect()->action('InventoryController@personals');
        }
    }

    public function personalEdit($id)
    {
        $personal = new Personal;
        $personal = $personal->find($id);
        $data['personal'] = $personal;
        return view('personal.edit', $data);
    }
    public function personalDelete($id)
    {
        $personal = new Personal;
        $personal = $personal->find($id);
        $personal->delete();
        if ($personal->role_id == 1) {
            return redirect()->action('InventoryController@providers');
        } else {
            return redirect()->action('InventoryController@personals');
        }
    }

    public function personalSetEdit(Request $values)
    {
        $personal = new Personal;
        $personal = $personal->find($values->id);
        $personal->rut = $values->rut;
        $personal->fullname = $values->fullname;
        $personal->email = $values->email;
        $personal->role_id = $values->role_id;
        $personal->phone = $values->phone;
        $personal->adress = $values->adress;
        $personal->save();
        if ($values->role_id == 1) {
            return redirect()->action('InventoryController@providers');
        } else {
            return redirect()->action('InventoryController@personals');
        }
    }
    public function tools()
    {
        $data['entries'] = Entry::all();
        return view('product.tools_list', $data);
    }
    public function inventory()
    {
        $data['products'] = new Product();
        $data['products'] =  $data['products']
            ->join('entry_details', 'products.id', '=', 'product_id')
            ->join('entries', 'entries.id', '=', 'entry_id')
            ->groupby('depot_id')
            ->get();
        return view('inventory.inventory', $data);
    }
}
