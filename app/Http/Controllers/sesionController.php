<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
//validacion de la contraseña
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Mail;
Use App\Mail\forgotMailable;

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
            'password2' => 'confirmar contraseña',
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

        if (Auth::attempt($credenciales, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('index'));
        } else {
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

    public function forgotIndex()
    {
        return view('sesiones/forgotPassword');
    }

    public function forgot(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $codigoSecreto = time() . $request->email;
            $user->forgot = $codigoSecreto;
            $user->save();
            $correo = new forgotMailable($user);
            Mail::to($user->email)->send($correo);
            return view('sesiones/enviado');
        } else {
            return redirect()->back()->with('error', 'Ese email no existe');
        }
    }

    public function forgotResetIndex($codigo)
    {
        return view('sesiones/forgotReset', compact('codigo'));
        
    }

    public function forgotReset(Request $request)
    {
        $request->validate([
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
        
        $user = User::where('forgot', $request->codigo)->first();
        
        $user->password=$request->password;
        $user->forgot=null;
        $user->save();
        
        return view('sesiones/inicioSesion');
        
    }

    public function resetPassword(Request $request)
    {

        $user = User::find(Auth::user()->id);

        //checamos que sean las mismas pass
        if (Hash::check($request->password, $user->password)) {

            $customAttributes = [
                'password2' => 'contraseña',
                'password22' => 'confirmar contraseña',
            ];

            $request->validate([

                'password2' => [
                    'required',
                    'max:50',
                    Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->symbols()
                        ->uncompromised(),
                ],
                'password22' => 'required|same:password2',

            ], [], $customAttributes);

            //a la BBDD
            //contraseña se cifran en el modelo user
            $user->password = $request->password2;
            $user->save();

            return redirect()->back();
        } else {
            return redirect()->back()->with('noCoinciden', 'Contraseña incorrecta');
        }
    }
}
