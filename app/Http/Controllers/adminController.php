<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    public function adminIndex()
    {
        $pedidos = pedidos::paginate(10);
        return view('admin/pedidos', compact('pedidos'));
    }

    public function downloadFile($id)
    {
        $pedido = pedidos::find($id);
        //return $pedido->material;
        
        if ($pedido) {
            //existe
            return response()->download($pedido->pathArchivo, $pedido->nombreArchivo);
        }else {
            //no existe
            return response('',404);
        }
        
    }
}
