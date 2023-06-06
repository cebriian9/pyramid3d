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
        //extraemos todos los datos del usuario para mostralos
        $userId = Auth::id();
        $pedidos = DB::table('pedidos')
            ->where('id_user', $userId)
            ->orderBy('pedidos.created_at', 'desc')
            ->get();

        return view('cuenta', compact('pedidos'));
    }

    public function updateDireccion(Request $request)
    {

        // Validar que todos los campos estén presentes
        $camposRequeridos = ['calle', 'provincia', 'postal', 'ciudad', 'nombre', 'apellido'];
        foreach ($camposRequeridos as $campo) {
            if (empty($request->$campo)) {
                return response()->json(['error' => 'Verifica los datos y no dejes ningún campo en blanco']);

            }
        }

        // Construir la dirección
        $direccion = $request->calle . " " . $request->provincia . " " . $request->postal . " " . $request->ciudad;

        // Actualizar los datos del usuario
        $user = User::find($request->id_user);
        $user->direccion = $direccion;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->save();

        // Devolver los datos actualizados
        return response()->json([
            'direccion' => $direccion,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido
        ]);
    }
}
