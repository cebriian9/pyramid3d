<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Stripe\Stripe;
use Stripe\Charge;

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

        //validamos que todo este y los tamaños no se modificaran
        $request->validate([
            'stlFile' => 'required|file|max:10240',
            'tamano' => 'required|numeric|min:10|max:250',
        ], [], $customAttributes);



        //extrameos el nombre original del archivo del cliente
        $stl = $request->file('stlFile');
        $extension = $stl->getClientOriginalExtension();



        if (!strcmp($extension, "stl")) {
            //si todo esta correcto y por ultimo el arcchivo es un .stl
            //calcular precio--

            $precio = 5;

            //calculo de material, pla +0%, abs +30% ,ptg +20%

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

            //calculo de relleno, 20-40 -30%, 50-70 +0%, 90-100 +20%
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

            //calculo de calidad, 01 +30%, 02 +0%, 03 -30%
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

            //precio + tamaño/10
            $precio = $precio + ($precio + $request->tamano / 10);


            //creamos el pedido

            $pedido = new pedidos();

            $file = $request->file('stlFile');

            //ponemos un nombre unico
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

            //lo enviamos a la siguite vista para comfirmacion de pago
            
            return view('pagos/confirmarPago', compact('pedido'));
        } else {
            return redirect()->back()->withErrors(['stlFile' => 'El archivo tiene que ser .stl']);
        }
    }

    public function confirmarPago(Request $request)
    {
        //recibimos pedido
        $pedidoUsuario = json_decode($request->pedido);
        
        //creamos el pago
        Stripe::setApiKey(config('services.stripe.secret'));
        $token = $request->stripeToken;

        //ponemos los datos del pago
        $charge = Charge::create([
            'amount' => ($pedidoUsuario->precio*100),//*100 por que stripe lo pone en centimos 2=2 centimos
            'currency' => 'eur',
            'description' => Auth::user()->id."-".Auth::user()->usuario.', Impresion de: '.$pedidoUsuario->nombreArchivo,//datos del usuario y que imprimio 
            'source' => $token,
            
        ]);
        
        //creamos el pedido para la base de datos
        $pedido = new pedidos();
        $pedido->id_user = Auth::user()->id;
        $pedido->material = $pedidoUsuario->material;
        $pedido->relleno = $pedidoUsuario->relleno;
        $pedido->calidad = $pedidoUsuario->calidad;
        $pedido->tamano = $pedidoUsuario->tamano;
        $pedido->precio = $pedidoUsuario->precio;
        $pedido->nombreArchivo = $pedidoUsuario->nombreArchivo;
        $pedido->pathArchivo = $pedidoUsuario->pathArchivo;
        $pedido->hecho = 0;



        //a la base de datos y para casa
        $pedido->save();

        return redirect()->route('confirmado');
    }

    public function confirmado()
    {
        //vista de pedido realizado
        return view('pagos.confirmado');
    }


    public function muestra3D(Request $request)
    {
        //buscar el archivo que nos piden y enviarlo por ajax
        $file = $request->file('archivo');
        $ruta = $file->storeAs('public/tmpStorage', time() . "-" . Auth::user()->usuario);

        return response()->json(['ruta' => $ruta]);
    }
}
