<?php

use App\Http\Controllers\ComercializacionController;
use App\Http\Controllers\ConocimientoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\OportunidadNegocioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\TipoProductoController;
use App\Http\Controllers\UserController;
use App\Models\ComercializacionProducto;
use App\Models\OportunidadNegocio;
use App\Models\Producto;
use App\Models\TipoProducto;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
//login
Route::get('/login', [LoginController::class,'vista'])->name('login');
Route::post('/logear',[LoginController::class,'login'])->name('logear');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
//---//
//Solicitudes
Route::get('/', [SolicitudController::class,'vista'])->name('cliente');
Route::post('/solicitud',[SolicitudController::class,'store_solicitud'])->name('solicitud.store');
Route::get('/solicitudes', [SolicitudController::class,'solicitudes'])->middleware('login');
Route::get('/solicitud/pro/{idSolicitud}',[SolicitudController::class,'productos'])->name('solicitudPro.view')->middleware('login');
Route::get('/solicitud/ser/{idSolicitud}',[SolicitudController::class,'servicios'])->name('solicitudSer.view')->middleware('login');
Route::post('/solicitud/revision', [SolicitudController::class,'revision']);
Route::get('/solicitudes/revisadas', [SolicitudController::class,'solicitudes_rev']);
//--//
Route::get('/inicio', function () {
     return view('welcome');
});
//Usuario
Route::get('/mostrar', [UserController::class,'index'])->middleware('login'); //envia los usuarios a la vista para mostrar usuarios
Route::get('/registro',[UserController::class,'vistaRegistro'])->name('usuario.registro')->middleware('login'); //mostrar vista de registro
Route::get('/usuarios',[UserController::class,'vistaUsuarios'])->middleware('login'); //mostrar vista de tabla usuarios
Route::post('/registrar',[UserController::class,'registrar']); //accion de registrar
Route::get('/usuarios/{rut}/editarRol',[UserController::class,'editRol'])->name('usuarios.editRol')->middleware('login');
Route::put('/usuarios/{user}',[UserController::class, 'updateRol'])->name('usuarios.update');
Route::get('usuario/{rut}/editPerfil',[UserController::class,'editPerfil'])->name('usuarios.editPerfil')->middleware('login');
Route::post('/usuarios/{user}',[UserController::class, 'updatePerfil'])->name('usuarios.updatePerfil');
Route::post('/delete/usuario', [UserController::class,'delete_user'])->name('usuarios.delete');
Route::get('/nombre/busqueda',[UserController::class,'busqueda_usuario'])->middleware('login');
//Negocio//
Route::get('/negocio-fase1', [OportunidadNegocioController::class,'vista_negocio_f1'])->name('negociof1.crear')->middleware('login');//vista fase1
Route::post('/store_f1', [OportunidadNegocioController::class,'store_negocio_f1'])->name('negociof1.store'); //store negocio
Route::get('/negocio-fase2', [OportunidadNegocioController::class,'vista_negocio_f2'] )->name('negociof2.crear')->middleware('login');//vista fase2
Route::post('/negocios',[OportunidadNegocioController::class,'store_negocio_f2'])->name('negocio.store');//store pro,ser y participante
Route::get('/negocio-fase3',[OportunidadNegocioController::class,'vista_negocio_f3'])->middleware('login');
Route::get('/verNegocios',[OportunidadNegocioController::class,'verNegocios'])->middleware('login'); //ver todos los negocios
Route::get('/verProAsoc/{idNegocio}',[OportunidadNegocioController::class,'verProAsociado'])->name('negocio.proAsoc')->middleware('login'); //ver productos Asociados
Route::get('/verSerAsoc/{idNegocio}',[OportunidadNegocioController::class,'verSerAsociado'])->name('negocio.serAsoc')->middleware('login'); //ver servicios Asociados
Route::get('/verParAsoc/{idNegocio}',[OportunidadNegocioController::class,'verParAsociado'])->name('negocio.partAsoc')->middleware('login'); //ver participantes Asociados
//añadir Productos
Route::get('/añadirPro/{idNegocio}',[OportunidadNegocioController::class,'añadirPro_view'])->name('añadirPro')->middleware('login');
Route::post('/añadirP',[OportunidadNegocioController::class,'añadir_store']);
Route::post('/eliminar/producto', [OportunidadNegocioController::class,'eliminarPro'])->name('Pro.delete');
//añadir Servicios
Route::get('/añadirSer/{idNegocio}',[OportunidadNegocioController::class,'añadirSer_view'])->name('añadirSer')->middleware('login');
Route::post('/añadirS',[OportunidadNegocioController::class,'añadirSer_store']);
Route::post('/eliminar/servicio', [OportunidadNegocioController::class,'eliminarSer'])->name('Ser.delete');
//añadir Participantes
Route::get('/añadirPar/{idNegocio}',[OportunidadNegocioController::class,'añadirPar_view'])->name('añadir.par')->middleware('login');
Route::post('/añadirPa',[OportunidadNegocioController::class,'añadirPar_store'])->name('añadirPar.store');
Route::post('/eliminar/participante', [OportunidadNegocioController::class,'eliminarPar'])->name('Par.delete');
//añadir Documentos
Route::get('/añadirDoc/{idNegocio}',[OportunidadNegocioController::class,'añadirDoc_view'])->name('añadir.doc')->middleware('login');
Route::post('/añadirD',[OportunidadNegocioController::class,'añadirDoc_store'])->name('añadir.storeDoc');
//archivos//
Route::get('/verDocAsoc/{idNegocio}',[OportunidadNegocioController::class,'verDocAsociado'])->name('negocio.docAsoc')->middleware('login'); //Documentos Asociados
Route::post('/up',[OportunidadNegocioController::class,'archivos'])->name('archivo.subir');
Route::get('/down/{documento}',[OportunidadNegocioController::class,'verArchivo'])->middleware('login');
//--Fin Negocio//
Route::post('/cambiar/estado',[OportunidadNegocioController::class,'cambiar_estado'])->name('estado');
//--------EDIT NEGOCIO----------//
Route::get('/view/producto/{id_pro_has_op}', [OportunidadNegocioController::class,'viewPro'])->name('viewPro')->middleware('login');//producto
Route::get('/edit/producto/{id_pro_has_op}',[OportunidadNegocioController::class,'edit_Pro'])->name('pro.edit')->middleware('login');//ver editar producto
Route::post('/editar/producto/asociado/{pro_has_op}', [OportunidadNegocioController::class,'editar_producto'])->name('ProAsociado.edit');//producto
Route::get('/configuracion/{id_pro_has_op}', [OportunidadNegocioController::class,'configuracion'])->name('configuracion')->middleware('login');
Route::post('/configuracion/{pro_has_op}', [OportunidadNegocioController::class,'save_configuracion'])->name('configuracion.save');

Route::get('/edit/servicio/{id_ser_has_op}',[OportunidadNegocioController::class,'edit_Ser'])->name('ser.edit')->middleware('login');//ver editar servicio
Route::post('/editar/servicio/asociado/{ser_has_op}', [OportunidadNegocioController::class,'editar_servicio'])->name('SerAsociado.edit');//servicio
Route::get('/view/servicio/{id_ser_has_op}', [OportunidadNegocioController::class,'viewSer'])->name('viewSer')->middleware('login');//producto
Route::get('/comentar/{id_ser_has_op}',  [OportunidadNegocioController::class,'comentario'])->name('comentario')->middleware('login');
Route::post('/comentar/{ser_has_op}', [OportunidadNegocioController::class,'save_comentario'])->name('comentario.save');
//---------------//
//COTIZACION//
Route::get('/datos/{idNegocio}',[CotizacionController::class,'cotizacion'])->name('vista.cotizacion')->middleware('login');
Route::get('/cotizacion/{idNegocio}',[CotizacionController::class,'crear_cotización'])->middleware('login');
Route::get('/enviar/{idNegocio}', [CotizacionController::class,'enviarCotizacion'])->name('enviar');
//--//
//ESTADOS//
Route::get('/estado/store',[EstadoController::class,'store_view'])->middleware('login');
Route::post('/estado', [EstadoController::class,'store_estado'])->name('estado.store');
Route::get('/estados',[EstadoController::class,'estados'])->middleware('login'); //todos los estados
Route::get('/estado/{idEstado}', [EstadoController::class,'edit_view'])->name('estado.edit')->middleware('login');
Route::post('/estado/update/{estado}', [EstadoController::class,'estado_update'])->name('estado.update');
Route::post('/delete/estado', [EstadoController::class,'delete_estado'])->name('estado.delete');
//--//
//Conocimiento//
Route::get('/conocimiento',[ ConocimientoController::class,'vistaConocimiento'])->middleware('login');
Route::post('/conocimiento-store',[ConocimientoController::class,'store_conocimiento'])->name('conocimiento.store');
Route::get('/conocimientos',[ConocimientoController::class,'conocimientos'])->middleware('login');//todos los conocimientos
Route::get('/conocimiento-edit/{idconocimiento}', [ConocimientoController::class,'vista_edit'])->name('conocimiento.edit')->middleware('login');
Route::post('/conocimiento/{conocimiento}', [ConocimientoController::class,'update_conocimiento'])->name('conocimiento.update');
Route::post('/delete/conocimiento', [ConocimientoController::class,'delete_conocimiento'])->name('conocimiento.delete');
//--//
//ComercializacionPro
Route::get('/comercializacion-pro',[ComercializacionController::class,'vistaComerPro'])->middleware('login');
Route::post('/comercializacion',[ComercializacionController::class,'store_comercializacion'])->name('comercializacion.store');
Route::get('/comercializaciones',[ComercializacionController::class,'comercializacionesPro'])->middleware('login');//todos las coemrcializaciones
Route::get('/edit/{idcoemrcializacion}', [ComercializacionController::class,'vista_edit'])->name('comerPro.edit')->middleware('login');//vista edit
Route::post('/store/edit/{comercializacion}',[ComercializacionController::class,'store_update'])->name('comerPro.update');
Route::post('/delete/comerPro', [ComercializacionController::class,'delete_comerPro'])->name('comerPro.delete')->middleware('login');
Route::get('/busqueda/comerPro',[ComercializacionController::class,'busqueda_comerPro']);

//--//
//ComercializacionSer
Route::get('/comercializacion-ser',[ComercializacionController::class,'vistaComerSer'])->middleware('login');
Route::post('/comercializacion-ser',[ComercializacionController::class,'store_comercializacionSer'])->name('comercializacionSer.store');
Route::get('/comercializaciones-ser', [ComercializacionController::class,'comercializacionesSer'])->middleware('login');//todas las comercializaciones
Route::get('/editComerSer/{idcomercializacion}',[ComercializacionController::class,'vista_edit_Ser'])->name('comerSer.edit')->middleware('login');
Route::post('/updateComerSer/{comercializacion}',[ComercializacionController::class,'store_updateSer'])->name('comerSer.update');
Route::post('/delete/comerSer', [ComercializacionController::class,'delete_comerSer'])->name('comerSer.delete');
Route::get('/comerSer/busqueda',[ComercializacionController::class,'busqueda_comerSer'])->middleware('login');
//--//
//TipoProducto//
Route::get('/tipo/producto',[TipoProductoController::class,'vistaTipoProducto'])->middleware('login');
Route::post('/tipo/productoStore',[TipoProductoController::class,'store_tipo_producto'])->name('tipoProducto.store');
Route::get('/tipo-productos',[TipoProductoController::class,'mostrar_tipoproductos'])->middleware('login');
Route::get('/editar/{idtipo_producto}/tipoProducto',[TipoProductoController::class,'edit_tipoproducto'])->name('tipoProducto.edit')->middleware('login');
Route::post('update/{tipoproducto}', [TipoProductoController::class,'update'])->name('tipoProducto.update');
Route::post('/delete/tipo/producto', [TipoProductoController::class,'delete_tipoproducto'])->name('tipoProducto.delete');
//--//
//Marca//
Route::get('/marca',[MarcaController::class,'vistaMarca'])->middleware('login');
Route::post('/marcas',[MarcaController::class,'store_marca'])->name('marca.store');
Route::get('/marcas/view', [MarcaController::class,'marcas'])->middleware('login');
Route::get('/editmarca/{idMac}', [MarcaController::class,'vistaEdit'])->name('marca.edit')->middleware('login');//vista edit
Route::post('/updatemarca/{marca}', [MarcaController::class,'updatemarca'])->name('marca.update');
Route::post('/delete/marca', [MarcaController::class,'delete_marca'])->name('marca.delete');
Route::get('/busqueda/marca',[MarcaController::class,'busqueda_marca'])->middleware('login');
//--//
//Productos//
Route::get('/registroProducto', [ProductoController::class,'vistaRegistro_Producto'])->middleware('login');
Route::post('/registrarProducto',[ProductoController::class,'store_producto'])->name('producto.registrar');
Route::get('/productos',[ProductoController::class,'mostrar_productos'])->name('productos.mostrar')->middleware('login');
Route::get('editar/{idproducto}',[ProductoController::class,'edit_producto'])->name('producto.edit')->middleware('login'); //vista editar producto
Route::post('/productos/{producto}',[ProductoController::class, 'update_producto'])->name('producto.updateProducto');
Route::post('/producto', [ProductoController::class,'delete'])->name('producto.delete');
Route::get('/productos/busqueda', [ProductoController::class,'busqueda'])->middleware('login');
//--//
//Servicios//
Route::get('/registroServicio', [ServicioController::class,'vistaRegistro_Servicio'])->middleware('login');
Route::post('/servicio',[ServicioController::class,'store_servicio'])->name('servicio.registrar');
Route::get('/servicios',[ServicioController::class,'mostrar_servicios'])->name('servicio.mostrar')->middleware('login');
Route::get('/editar/{idServicio}/servicios', [ServicioController::class,'edit_servicio'])->name('servicio.edit')->middleware('login');
Route::post('/servicio/{servicio}',[ServicioController::class, 'update_servicio'])->name('servicio.updateServicio');
Route::get('/servicios/busqueda', [ServicioController::class,'busquedaServicio'])->middleware('login');
Route::post('/delete/servicio', [ServicioController::class,'delete_servicio'])->name('servicio.delete');
//--//
//comercializaciones por tipo producto//
Route::get('comercializaciones/{id}',[OportunidadNegocioController::class,'getComercializacion'])->middleware('login');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('login');
