<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
//validacion de la contraseña
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class sesionController extends Controller
{
    public function registroIndex()
    {
        return view('sesiones/registro');
    }

    public function registroCreate(Request $request)
    {
        $customAttributes = [
            'password' => 'contraseña',
            'password2'=>'confirmar contraseña',
        ];

        $request->validate([
            'usuario' => 'required|min:3|max:25|unique:usuarios,usuario',
            'email' => 'required|unique:usuarios,email|email',
            'password' => [
                'required',
                'max:50',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'password2' => 'required|same:password'
        ]);

        //creo el objeto usuario 
        $user = new User();

        $user->usuario = $request->usuario;
        $user->email = $request->email;
        //contraseña se cifran en el modelo user
        $user->password = $request->password;

        //$user=User::create([$request->all()]);

        //a la base de datos y para casa
        $user->save();

        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->intended(route('index')); //devuelve a la pagina que intentaba entrar
    }

    public function inicioSesionIndex()
    {
        return view('sesiones/inicioSesion');
    }

    public function inicioSesion(Request $request)
    {
        $credenciales = [
            'usuario' => $request->usuario,
            'password' => $request->password
        ];

        $remember = ($request->has('remember') ? true : false);

        if (Auth::attempt($credenciales,$remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('index'));
        }else {
            return redirect()->back()->with('error', 'Credenciales inválidas');
        }

        return redirect()->intended(route('index'));
    }


    public function logOut(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect(route('inicioSesion'));
    }

    public function resetPassword(Request $request)
    {
        $user=User::find(Auth::user()->id);
        
        if ($user->password===Hash::make($request->password)) {
            return "misma pass";
        }else {
            return "nmo".$user->password." ///// ".Hash::make($request->password);
        }
    }
}
