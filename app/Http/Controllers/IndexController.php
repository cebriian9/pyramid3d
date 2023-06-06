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


    //entorno de pruebas
    public function pruebas()
    {
        return view('pruebas');
    }

    
}
