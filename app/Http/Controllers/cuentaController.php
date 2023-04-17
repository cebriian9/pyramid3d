<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class cuentaController extends Controller
{
    public function cuentaIndex()
    {
        $user = User::all();
        return view('cuenta', compact('user'));
    }

    public function updateDireccion(Request $request)
    {
        
        if ($request->calle == null || $request->numero == null || $request->provincia == null || $request->postal == null || $request->ciudad == null || $request->nombre == null || $request->apellido == null) {

            
            return "<span class='text-danger'>**Conprueba los datos y no dejes ningun capo en blanco**</span>";
        } else {
            $direccion = $request->calle . " Nº" . $request->numero . " " . $request->provincia . " " . $request->postal . " " . $request->ciudad;

            $user = User::find($request->id_user);
            $user->direccion = $direccion;

            $user->nombre=$request->nombre;
            $user->apellido=$request->apellido;

            $user->save();

            return $direccion;
        }
    }
}
