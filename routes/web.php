<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\sesionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', IndexController::class)->name('index');

Route::get('/privada', function () {
    return view('privada');
})->middleware('auth')->name('imprimir');

//ir a pagina de registrarse/iniciosesion
Route::get('sesiones/registro',[sesionController::class,'registroIndex'])->name('registro')->middleware('guest');
Route::get('sesiones/inicioSesion',[sesionController::class,'inicioSesionIndex'])->name('inicioSesion')->middleware('guest');

//registrarse
Route::post('registro/registrarse',[sesionController::class,'registroCreate'])->name('registrarse');
//iniciarSesion
Route::post('registro/inicioSesion',[sesionController::class,'inicioSesion'])->name('inicioSes');
//logOut
Route::get('registro/logOut',[sesionController::class,'logOut'])->name('logOut');
