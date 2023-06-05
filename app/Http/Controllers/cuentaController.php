<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class cuentaController extends Controller
{
    public function cuentaIndex()
    {
        $userId = Auth::id();

        
        $pedidos = DB::table('pedidos')
            ->where('id_user', $userId)
            ->orderBy('pedidos.created_at', 'desc')
            ->get();
        return view('cuenta', compact('pedidos'));
    }

    public function updateDireccion(Request $request)
    {

        if ($request->calle == null || $request->provincia == null || $request->postal == null || $request->ciudad == null || $request->nombre == null || $request->apellido == null) {


            return "<span class='text-danger'>**Conprueba los datos y no dejes ningun capo en blanco**</span>";
        } else {
            $direccion = $request->calle . " " . $request->provincia . " " . $request->postal . " " . $request->ciudad;

            $user = User::find($request->id_user);
            $user->direccion = $direccion;

            $user->nombre = $request->nombre;
            $user->apellido = $request->apellido;

            $user->save();

            return ['direccion' => $direccion, "nombre" => $request->nombre, "apellido" => $request->apellido];
        }
    }
}
