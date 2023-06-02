<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use Stripe\Stripe;
use Stripe\Charge;


class IndexController extends Controller
{
    public function __invoke()
    {
        return view('index');
    }


    public function pruebas()
    {
        return view('pruebas');
    }

    public function pago(Request $request)
    {
        //return $request;
        Stripe::setApiKey(config('services.stripe.secret'));
        $token = $request->stripeToken;

        $charge = Charge::create([
            'amount' => 200,
            'currency' => 'eur',
            'description' => 'Prueba PTM',
            'source' => $token,
            
        ]);

        return back();
    }
}
