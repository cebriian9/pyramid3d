<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class enlacesController extends Controller
{
    public function faqs()
    {

        return view('/enlaces/faqs');
    }

    public function sobreNosotros()
    {

        return view('/enlaces/sobreNosotros');
    }

    public function privacidad()
    {

        return view('/enlaces/privacidad');
    }

    public function contacto()
    {

        return view('/enlaces/contacto');
    }
}
