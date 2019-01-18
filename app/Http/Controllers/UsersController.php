<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Curso;
use App\Http\Requests\UserStore;
use App\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    function index()
    {

        $data['users'] = User::all();
        $data['titulo'] = "Listado de Usuarios";
        // Pasarlas a la vista
        return view('administrador.users.listado', $data);
    }

    function edit($id)
    {
        // Obtener las modulos de la BD
        $data['usuario'] = User::find($id);
        $data['titulo'] = "Editar Usuario";
        // Pasarlas a la vista
        return view('administrador.users.editar', $data);
    }

    function create()
    {
        $data['titulo'] = "Crear Usuarios";
        $data['id'] = '';
        $data['usuario'] = '';
        // Pasarlas a la vista
        return view('administrador.users.nuevo', $data);
    }

    function store( Request $values)
    {
        //$this->validate($valores,$ruler);
        // Obtener las modulos de la BD
        $user = new User();
        $user->name = $values->name;
        $user->email = $values->email;
        if (isset($values->password)) {
            $user->password = \Hash::make($values->password);
        }
        $user->save();

        return redirect('admin/users/')->with('success', '¡Se Creo el Usuario correctamente!');
    }

    function destroy($id)
    {
        // Obtener las modulos de la BD
        $user = User::find($id);
        $user->delete();
        // Pasarlas a la vista
        return redirect('admin/users/')->with('success', '¡Se Elimino el Usuario correctamente!');
    }

    function update($id, Request $values)
    {
        //$this->validate($valores,$ruler);
        // Obtener las modulos de la BD
        $user = User::find($id);
        $user->name = $values->name;
        $user->email = $values->email;
        if (isset($values->password)) {
            $user->password = \Hash::make($values->password);
        }
        $user->save();
        return redirect('admin/users/')->with('success','¡Se actualizo el Usuario correctamente!');
    }

}
