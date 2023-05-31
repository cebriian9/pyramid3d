<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function adminIndex()
    {
        //$pedidos = pedidos::paginate(10);

        $pedidos = DB::table('pedidos')
            ->join('usuarios', 'usuarios.id', '=', 'pedidos.id_user')
            ->select('pedidos.*', 'usuarios.usuario')
            ->orderBy('pedidos.created_at', 'desc')
            ->paginate(10);

        return view('admin/pedidos', compact('pedidos'));
    }

    public function updatePedido(Request $request)
    {
        $pedido = pedidos::find($request->id);
        $pedido->hecho = !$pedido->hecho;
        $pedido->save();

        return "hola";
    }

    public function downloadFile($id)
    {
        $pedido = pedidos::find($id);
        //return $pedido->material;

        if ($pedido) {
            //existe
            return response()->download($pedido->pathArchivo, $pedido->nombreArchivo);
        } else {
            //no existe
            return response('', 404);
        }
    }

    public function datosPedido($id)
    {
        $pedido = pedidos::find($id);
        $user = User::find($pedido->id_user);

        return view('admin/datosPedido', compact('pedido', 'user'));
    }

    public function contacto(Request $request)
    {
        //pyramid3d.soporte@gmail.com
        $asunto=$request->asunto;
        $usuario=$request->usuario;

        

        if (!empty($asunto) && !empty($usuario) && !empty($request->mensaje)) {
            // Enviar el correo
        Mail::raw($request->mensaje, function ($message) use ($asunto,$usuario) {
            $message->to('pyramid3d.soporte@gmail.com');
            $message->subject($usuario.", ".$asunto);
        });

        return redirect()->back()->with('enviado', 'Correo enviado exitosamente');
        } else {
            return redirect()->back()->with('fallo', 'Rellene todos los campos*');
        }
        
    }
}
