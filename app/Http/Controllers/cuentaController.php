<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class cuentaController extends Controller
{
    public function cuentaIndex()
    {
        $user= User::all();
        return view('cuenta', compact('user'));
    }
}
