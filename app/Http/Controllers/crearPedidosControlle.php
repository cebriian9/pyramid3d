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
            'tamano' => 'required|numeric|min:10|max:250',
        ], [], $customAttributes);

        

        
        $stl = $request->file('stlFile');
        $extension = $stl->getClientOriginalExtension();


        
        if (!strcmp($extension, "stl")) {
            //calcular precio--
            
            $precio = 5;

                //calculo de material, pla +0%, abs +3% ,ptg +2%

                switch ($request->material) {
                    case "PLA":
                        //precio = precio + (precio)
                        break;
                    case "ABS":
                        $precio = $precio + ($precio * 0.3);
                        break;
                    case "PTG":
                        $precio = $precio + ($precio * 0.2);
                        break;

                    default:
                        break;
                }

                switch ($request->relleno) {
                    case "20-40":
                        $precio = $precio - ($precio * 0.3);
                        break;
                    case "50-70":

                        break;
                    case "90-100":
                        $precio = $precio + ($precio * 0.2);
                        break;

                    default:
                        break;
                }

                switch ($request->calidad) {
                    case "01":
                        $precio = $precio + ($precio * 0.3);
                        break;
                    case "02":

                        break;
                    case "03":

                        $precio = $precio - ($precio * 0.3);
                        break;

                    default:
                        break;
                }

                $precio = $precio + ($precio + $request->tamano / 10);

                
            ///calcular precio--

            $pedido = new pedidos();

            $file = $request->file('stlFile');

            $nombreArchivo = time() . "-" . $file->getClientOriginalName();
            $pathArchivo = $request->file('stlFile')->storeAs('public', $nombreArchivo);


            $pedido->id_user = Auth::user()->id;
            $pedido->material = $request->material;
            $pedido->relleno = $request->relleno;
            $pedido->calidad = $request->calidad;
            $pedido->tamano = $request->tamano;
            $pedido->precio = $precio;
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
