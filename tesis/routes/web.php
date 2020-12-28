<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OportunidadNegocioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Models\OportunidadNegocio;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/', function () {
     return view('FormCliente');
})->name('cliente');

Route::get('/inicio', function () {
     return view('welcome');
});
// vistas


//----//
//login
Route::get('/login', [LoginController::class,'vista'])->name('login');
Route::post('/logear',[LoginController::class,'login'])->name('logear');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
//---//
//Usuario
Route::get('/mostrar', [UserController::class,'index']); //envia los usuarios a la vista para mostrar usuarios
Route::get('/registro',[UserController::class,'vistaRegistro'])->name('usuario.registro'); //mostrar vista de registro
Route::get('/usuarios',[UserController::class,'vistaUsuarios']); //mostrar vista de tabla usuarios
Route::post('/registrar',[UserController::class,'registrar']); //accion de registrar
Route::get('/usuarios/{rut}/editarRol',[UserController::class,'editRol'])->name('usuarios.editRol');
Route::put('/usuarios/{user}',[UserController::class, 'updateRol'])->name('usuarios.update');
Route::get('usuario/{rut}/editPerfil',[UserController::class,'editPerfil'])->name('usuarios.editPerfil');
Route::post('/usuarios/{user}',[UserController::class, 'updatePerfil'])->name('usuarios.updatePerfil');
//Negocio//
Route::get('/negocio', [OportunidadNegocioController::class,'vistaNegocio'])->name('negocio.crear');

//--//
//Productos//
Route::get('/registroProducto', [ProductoController::class,'vistaRegistro_Producto']);
Route::post('/registrarProducto',[ProductoController::class,'store_producto'])->name('producto.registrar');
Route::get('/productos',[ProductoController::class,'mostrar_productos'])->name('productos.mostrar');
Route::get('editar/{idproducto}',[ProductoController::class,'edit_producto'])->name('producto.edit'); //vista editar producto
Route::post('/productos/{producto}',[ProductoController::class, 'update_producto'])->name('producto.updateProducto');
Route::delete('producto/{producto}', [ProductoController::class,'delete'])->name('producto.delete');
//--//
//Servicios//

//--//



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
