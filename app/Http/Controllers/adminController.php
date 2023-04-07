<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function adminIndex()
    {
        $pedidos = pedidos::all();
        return view('admin/pedidos', compact('pedidos'));
    }

    public function download($fileName)
    {
        
    }
}
