<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\crearPedidosControlle;
use App\Http\Controllers\cuentaController;
use App\Http\Controllers\enlacesController;
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

Route::get('pruebas', [IndexController::class,'pruebas'])->name('pruebas');


Route::get('/', IndexController::class)->name('index');

//admins
Route::get('admin/pedidos',[adminController::class,'adminIndex'])->name('pedidos')->middleware('auth')->middleware('admin');//que no entre cualquira
Route::get('admin/pedidos/download/{id}',[adminController::class,'downloadFile'])->name('descarga')->middleware('auth')->middleware('admin');
Route::post('admin/pedidos/update', [adminController::class,'updatePedido'])->name('updatePedido')->middleware('admin');
Route::get('admin/datosPedido/{id}',[adminController::class,'datosPedido'])->name('datosPedido')->middleware('admin');

//cuenta
Route::get('cuenta', [cuentaController::class,'cuentaIndex'])->name('cuenta')->middleware('auth');
Route::post('cuenta/direccion',[cuentaController::class,'updateDireccion'])->name('updateDireccion');

//reset password
Route::post('registro/reset',[sesionController::class,'resetPassword'])->name('resetPassword');

//forgot
Route::get('sesiones/forgotPassword',[sesionController::class,'forgotIndex'])->name('forgotPassword');
Route::post('sesiones/forgotPassword',[sesionController::class,'forgot'])->name('forgotPassword');

Route::get('sesiones/forgotPassword/{codigo}',[sesionController::class,'forgotResetIndex'])->name('forgotResetIndex');
Route::post('sesiones/forgotPassword/reset',[sesionController::class,'forgotReset'])->name('forgotReset');


//ir a pagina de registrarse/iniciosesion
Route::get('sesiones/registro',[sesionController::class,'registroIndex'])->name('registro')->middleware('guest');
Route::get('sesiones/inicioSesion',[sesionController::class,'inicioSesionIndex'])->name('inicioSesion')->middleware('guest');

//ir a pedidos
Route::get('/impresion',[crearPedidosControlle::class,'impresionIndex'])->name('impresion')->middleware('auth');
//crear pedido
Route::post('/impresion',[crearPedidosControlle::class,'crearImpresion'])->name('crearImpresion')->middleware('auth');
//pagar pedido--
Route::post('/confirmarPago',[crearPedidosControlle::class,'confirmarPago'])->name('confirmarPago')->middleware('auth');
//pago confrimado y pedido echo
Route::get('/confirmado',[crearPedidosControlle::class,'confirmado'])->name('confirmado')->middleware('auth');
//visor 3D
Route::post('/muestra3D',[crearPedidosControlle::class,'muestra3D'])->name('muestra3D');

//registrarse
Route::post('registro/registrarse',[sesionController::class,'registroCreate'])->name('registrarse');
//iniciarSesion
Route::post('registro/inicioSesion',[sesionController::class,'inicioSesion'])->name('inicioSes');
//logOut
Route::get('registro/logOut',[sesionController::class,'logOut'])->name('logOut');


//copsitas que poca gente usa
Route::get('preguntas_frecuentes',[enlacesController::class,'faqs'])->name('faqs');
Route::get('sobreNosotros',[enlacesController::class,'sobreNosotros'])->name('sobreNosotros');
Route::get('privacidad',[enlacesController::class,'privacidad'])->name('privacidad');
Route::get('contacto',[enlacesController::class,'contacto'])->name('contacto');

Route::post('contacto',[adminController::class,'contacto'])->name('enviarMensaje');