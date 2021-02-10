<?php

use App\Http\Controllers\ComercializacionController;
use App\Http\Controllers\ConocimientoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\OportunidadNegocioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TipoProductoController;
use App\Http\Controllers\UserController;
use App\Models\ComercializacionProducto;
use App\Models\OportunidadNegocio;
use App\Models\TipoProducto;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
Route::get('/negocio-fase1', [OportunidadNegocioController::class,'vista_negocio_f1'])->name('negociof1.crear');//vista fase1
Route::post('/store_f1', [OportunidadNegocioController::class,'store_negocio_f1'])->name('negociof1.store'); //store negocio
Route::get('/negocio-fase2', [OportunidadNegocioController::class,'vista_negocio_f2'] )->name('negociof2.crear');//vista fase2
Route::post('/negocios',[OportunidadNegocioController::class,'store_negocio_f2'])->name('negocio.store');//store pro,ser y participante
Route::get('/negocio-fase3',[OportunidadNegocioController::class,'vista_negocio_f3']);
Route::get('/verNegocios',[OportunidadNegocioController::class,'verNegocios']); //ver todos los negocios
Route::get('/verProAsoc/{idNegocio}',[OportunidadNegocioController::class,'verProAsociado'])->name('negocio.proAsoc'); //ver productos Asociados
Route::get('/verSerAsoc/{idNegocio}',[OportunidadNegocioController::class,'verSerAsociado'])->name('negocio.serAsoc'); //ver servicios Asociados
Route::get('/verParAsoc/{idNegocio}',[OportunidadNegocioController::class,'verParAsociado'])->name('negocio.partAsoc'); //ver participantes Asociados
//añadir Productos
Route::get('/añadirPro',[OportunidadNegocioController::class,'añadirPro_view']);
//añadir Servicios
Route::get('/añadirSer',[OportunidadNegocioController::class,'añadirSer_view']);
//añadir Participantes
Route::get('/añadirPar',[OportunidadNegocioController::class,'añadirPar_view']);
//archivos//
Route::get('/verDocAsoc/{idNegocio}',[OportunidadNegocioController::class,'verDocAsociado'])->name('negocio.docAsoc'); //Documentos Asociados
Route::post('/up',[OportunidadNegocioController::class,'archivos'])->name('archivo.subir');
Route::get('/down/{documento}',[OportunidadNegocioController::class,'verArchivo']);

//--Fin Negocio//
//Conocimiento//
Route::get('/conocimiento',[ ConocimientoController::class,'vistaConocimiento']);
Route::post('/conocimiento-store',[ConocimientoController::class,'store_conocimiento'])->name('conocimiento.store');
Route::get('/conocimientos',[ConocimientoController::class,'conocimientos']);//todos los conocimientos
Route::get('/conocimiento-edit/{idconocimiento}', [ConocimientoController::class,'vista_edit'])->name('conocimiento.edit');
Route::post('/conocimiento/{conocimiento}', [ConocimientoController::class,'update_conocimiento'])->name('conocimiento.update');
//--//
//ComercializacionPro
Route::get('/comercializacion-pro',[ComercializacionController::class,'vistaComerPro']);
Route::post('/comercializacion',[ComercializacionController::class,'store_comercializacion'])->name('comercializacion.store');
Route::get('/comercializaciones',[ComercializacionController::class,'comercializacionesPro']);//todos las coemrcializaciones
Route::get('/edit/{idcoemrcializacion}', [ComercializacionController::class,'vista_edit'])->name('comerPro.edit');//vista edit
Route::post('/store/edit/{comercializacion}',[ComercializacionController::class,'store_update'])->name('comerPro.update');

//--//
//ComercializacionSer
Route::get('/comercializacion-ser',[ComercializacionController::class,'vistaComerSer']);
Route::post('/comercializacion-ser',[ComercializacionController::class,'store_comercializacionSer'])->name('comercializacionSer.store');
Route::get('/comercializaciones-ser', [ComercializacionController::class,'comercializacionesSer']);//todas las comercializaciones
Route::get('/editComerSer/{idcomercializacion}',[ComercializacionController::class,'vista_edit_Ser'])->name('comerSer.edit');
Route::post('/updateComerSer/{comercializacion}',[ComercializacionController::class,'store_updateSer'])->name('comerSer.update');
//--//
//TipoProducto//
Route::get('/tipo/producto',[TipoProductoController::class,'vistaTipoProducto']);
Route::post('/tipo/productoStore',[TipoProductoController::class,'store_tipo_producto'])->name('tipoProducto.store');
Route::get('/tipo-productos',[TipoProductoController::class,'mostrar_tipoproductos']);
Route::get('/editar/{idtipo_producto}',[TipoProductoController::class,'edit_tipoproducto'])->name('tipoProducto.edit');
Route::post('update/{tipoproducto}', [TipoProductoController::class,'update'])->name('tipoProducto.update');
//--//
//Marca//
Route::get('/marca',[MarcaController::class,'vistaMarca']);
Route::post('/marcas',[MarcaController::class,'store_marca'])->name('marca.store');
Route::get('/marcas/view', [MarcaController::class,'marcas']);
Route::get('/editmarca/{idMac}', [MarcaController::class,'vistaEdit'])->name('marca.edit');//vista edit
Route::post('/updatemarca/{marca}', [MarcaController::class,'updatemarca'])->name('marca.update');
//--//
//Productos//
Route::get('/registroProducto', [ProductoController::class,'vistaRegistro_Producto']);
Route::post('/registrarProducto',[ProductoController::class,'store_producto'])->name('producto.registrar');
Route::get('/productos',[ProductoController::class,'mostrar_productos'])->name('productos.mostrar');
Route::get('editar/{idproducto}',[ProductoController::class,'edit_producto'])->name('producto.edit'); //vista editar producto
Route::post('/productos/{producto}',[ProductoController::class, 'update_producto'])->name('producto.updateProducto');
Route::delete('producto/{producto}', [ProductoController::class,'delete'])->name('producto.delete');
Route::get('/productos/busqueda', [ProductoController::class,'busqueda']);
//--//
//Servicios//
Route::get('/registroServicio', [ServicioController::class,'vistaRegistro_Servicio']);
Route::post('/servicio',[ServicioController::class,'store_servicio'])->name('servicio.registrar');
Route::get('/servicios',[ServicioController::class,'mostrar_servicios'])->name('servicio.mostrar');
Route::get('/editar/{idServicio}/servicios', [ServicioController::class,'edit_servicio'])->name('servicio.edit');
Route::post('/servicio/{servicio}',[ServicioController::class, 'update_servicio'])->name('servicio.updateServicio');
Route::get('/servicios/busqueda', [ServicioController::class,'busquedaServicio']);
//--//
//comercializaciones por tipo producto//
Route::get('comercializaciones/{id}',[OportunidadNegocioController::class,'getComercializacion']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
