<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
        $user = User::find(Auth::user()->id);
        $user->admin = 1;
        $user->save();

        Auth::user();
        return view('pruebas');
    }

    
}
