<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class crearPedidosControlle extends Controller
{
    public function impresionIndex()
    {

        return view('/impresion');
    }


    public function crearImpresion(Request $request)
    {

        $customAttributes = [
            'stlFile' => 'Archivo',
            'tamano' => 'tamaño',
        ];

        $request->validate([
            'stlFile' => 'required|file|max:10240',
            'tamaño' => 'min:10|max:250',
        ], [], $customAttributes);



        $stl = $request->file('stlFile');
        $extension = $stl->getClientOriginalExtension();



        if (!strcmp($extension, "stl")) {

            $pedido = new pedidos();
            /*
                'id_user',
                'material',
                'relleno',
                'calidad',
                'tamano', 
                'nombreArchivo', 
                'pathArchivo'
                */
            $file = $request->file('stlFile');

            $nombreArchivo = time() . "-" . $file->getClientOriginalName();
            $pathArchivo = $request->file('stlFile')->storeAs('public', $nombreArchivo);


            $pedido->id_user = Auth::user()->id;
            $pedido->material = $request->material;
            $pedido->relleno = $request->relleno;
            $pedido->calidad = $request->calidad;
            $pedido->tamano = $request->tamano;

            $pedido->nombreArchivo = $nombreArchivo;
            $pedido->pathArchivo = $pathArchivo;
            $pedido->hecho = 0;



            //a la base de datos y para casa
            $pedido->save();
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors(['stlFile' => 'El archivo tiene que ser .stl']);
        }
    }


    public function muestra3D(Request $request)
    {

        $file = $request->file('archivo');
        $ruta = $file->storeAs('public/tmpStorage', time() . "-" . Auth::user()->usuario);
        
        return response()->json(['ruta' => $ruta]);
    }

}
