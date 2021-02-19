<?php

namespace App\Http\Controllers;

use App\Models\ComercializacionProducto;
use App\Models\ComercializacionServicio;
use App\Models\CompaniaCotiza;
use App\Models\ConocimientoServicio;
use App\Models\Documento;
use App\Models\Estado;
use App\Models\OportunidadNegocio;
use App\Models\OportunidadNegocioHasServicio;
use App\Models\Producto;
use App\Models\ProductoHasOportunidadNegocio;
use App\Models\Servicio;
use App\Models\User;
use App\Models\UsuarioParticipaON;
use Exception;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OportunidadNegocioController extends Controller
{
    //vista Negocio
    public function vista_negocio_f1(){
        return view('Negocio.Fase1');
    }
    public function vista_negocio_f2(){
        $productos = Producto::all();
        $servicios = Servicio::all();
        $usuarios = User::all();
        $conocimientos = ConocimientoServicio::all();
        $comercializaciones = ComercializacionProducto::all();
        $comercializacionSer = ComercializacionServicio::all();
        return view('Negocio.Fase2',compact('productos','servicios','usuarios','conocimientos','comercializaciones','comercializacionSer'));
    }

    public function vista_negocio_f3(){
        return view('Negocio.Fase3');
    }

    public function store_negocio_f1(Request $request){
        //almacenar los datos de la compañia que cotiza
        $compañia = new CompaniaCotiza();
        $compañia->compañia = $request->compañia;
        $compañia->correo = $request->correo_compañia;
        $compañia->domicilio = $request->direccion_compañia;
        $compañia->telefono = $request->telefono_compañia;

        if($compañia->save()){
            //guardar nombre negocio descripcion estado y usuario asociado a la creación
            date_default_timezone_set('America/Santiago');
            $estado = Estado::where("nombre_estado","Fase 1:Creación Negocio")->first();//estado inicial 
            $op = new OportunidadNegocio();
            $op->nombre_negocio = $request->nombre_negocio;
            $op->descripcion = $request->descripcion;
            $op->estado_idestado = $estado->idEstado;
            session_start(["name" =>"Login"]);
            $op->usuario_rut = $_SESSION['rut'];
            $op->idcompañia_cotiza = $compañia->idcompañia_cotiza;
            if($op->save()){
                $_SESSION['idNegocio'] = $op->idNegocio;
                $_SESSION['nombre_negocio'] = $op->nombre_negocio;
                $_SESSION['descripcion_op'] = $op->descripcion;
                $_SESSION['estado_op'] = $op->estado_idestado;
                $_SESSION['rut_op'] = $op->usuario_rut;
                toast('Fase 1 compeltada exitosamente','success');
                return redirect()->route('negociof2.crear');
            }else{
                toast('Error en la creación del negocio','warning');
                return back();
            }
        }else{
            toast('Error en la creación del negocio','warning');
            return back();
        }
    }

    public function store_negocio_f2(Request $request){
        //inicializar contadores 
        $cont_pro = 0;
        $cont_ser = 0;
        $cont_part = 0;
        $negocio = $request['negocio']; //array con los datos del negocio
        $productos = $request['productos'];//array con los productos
        $servicios = $request['servicios']; //array con los servicios
        // $servicios = json_decode($servicios);
        $participantes = $request['participantes'];//array con los participantes
        // $participantes = json_decode($participantes);
        //validar si es que vienen productos servicios participantes
        //almacenando productos; 
        $contador = 0;
        if($productos != ""){
            foreach($productos as $producto){
                $pro_has_op = new ProductoHasOportunidadNegocio();
                $pro_has_op->producto_idproducto = $producto["producto_id"];
                $pro_has_op->oportunidad_negocio_idNegocio = $negocio[0];
                $pro_has_op->costo_producto = $producto["precioPcosto"];
                $pro_has_op->precio_ventaPro = $producto["precioPventa"];
                $pro_has_op->configuracion = $producto["configuracion"];
                $pro_has_op->margen_NegocioPro = $producto["margen_negocioPro"];
                $pro_has_op->margen_vendedorPro = $producto["margen_vendedorPro"];
                $pro_has_op->ganancia_vendedorPro = $producto["ganancia_vendedor"];
                $pro_has_op->utilidadPro = $producto["utilidadPro"];
                $pro_has_op->numero_meses = $producto["numero_meses"];
                $pro_has_op->precio_mes = $producto["precioxmes"];
                $pro_has_op->comercializacion_producto_idcomercializacion_producto = $producto["comercializacionproducto_id"];
                $pro_has_op->cantidad_productos = $producto['cantidad_productos'];
                $pro_has_op->save();
                $contador++;
            }
            $cont_pro = count($productos);
        }
        //almacenando servicios
        if($servicios != ""){
            foreach($servicios as $servicio){
                $op_has_ser = new OportunidadNegocioHasServicio();
                $op_has_ser->servicio_idservicio = $servicio["servicio_id"];
                $op_has_ser->oportunidad_negocio_idNegocio = $negocio[0];
                $op_has_ser->conocimiento_servicio_idconocimiento_servicio = $servicio["conocimiento_id"];
                $op_has_ser->comercializacion_servicio_idcomercializacion_servicio = $servicio["comercializacionservicio_id"];
                $op_has_ser->costo_hora = $servicio["costoxhora"];
                $op_has_ser->cantidad_horas = $servicio["cantidad_hora"];
                $op_has_ser->costo_totalSer = $servicio["costo_total"];
                $op_has_ser->margen_negocioSer = $servicio["margen_negocioSer"];
                $op_has_ser->valor_total_cliente = $servicio["precioSventa"];
                $op_has_ser->utilidadSer = $servicio["utilidadSer"];
                $op_has_ser->margen_vendedorSer = $servicio["margen_vendedorSer"];
                $op_has_ser->comentarios = $servicio["comentario"];
                $op_has_ser->meses = $servicio["meses"];
                $op_has_ser->costo_total_mes = $servicio["costo_total_mes"];
                $op_has_ser->valor_cliente_hora = $servicio["valor_cliente_hora"];
                $op_has_ser->valor_venta_mes = $servicio["valor_venta_mes"];
                $op_has_ser->ganancia_vendedorSer = $servicio["ganancia_vendedorSer"];
                $op_has_ser->ganancia_vendedorSer_clp = $servicio["ganancia_vendedorSer_clp"];
                $op_has_ser->costo_totalSer_clp = $servicio["costo_totalSer_clp"];
                $op_has_ser->costo_total_mes_clp = $servicio["costo_total_mes_clp"];
                $op_has_ser->save();
                $contador++;
            }
            $cont_ser = count($servicios);
        }

        if($participantes != ""){
         //almacenando participantes  
         for($i=0; $i < count($participantes); $i++){ 
            $user_participa = new UsuarioParticipaON();
            $user_participa->usuario_rut = $participantes[$i];
            $user_participa->oportunidad_negocio_idoportunidad_negocio = $negocio[0];
            $user_participa->save();
            $contador++;
         }
         $cont_part = count($participantes);
        }
        $suma = $cont_pro+$cont_ser+$cont_part;
        if($suma == $contador){
            //inserciones con exito, cambio estado a fase 2
            $negocio = OportunidadNegocio::where("idNegocio",$negocio[0])->first();
            $estado = Estado::where("nombre_estado","Fase 2:Inserción Productos, Servicios y Participantes")->first();
            $negocio->estado_idestado = $estado->idEstado;
            if($negocio->save()){
                toast('Productos y/o Servicios agregados exitosamente','success');
                return 0;
            }else{
                toast('Error al agregar producto y/o servicios','success');
                return 1;    
            }
        }else{
         //error en las inserciones
         toast('Error al agregar producto y/o servicios','success');
            return 1;
        }
    }
    //guardar los productos añadidos
    public function añadir_store(Request $request){
        $negocio = $request['negocio']; //
        $productos = $request['productos'];
        $contador = 0;
        if($productos != ""){
            foreach($productos as $producto){
                $pro_has_op = new ProductoHasOportunidadNegocio();
                $pro_has_op->producto_idproducto = $producto["producto_id"];
                $pro_has_op->oportunidad_negocio_idNegocio = $negocio[0];
                $pro_has_op->costo_producto = $producto["precioPcosto"];
                $pro_has_op->precio_ventaPro = $producto["precioPventa"];
                $pro_has_op->configuracion = $producto["configuracion"];
                $pro_has_op->margen_NegocioPro = $producto["margen_negocioPro"];
                $pro_has_op->margen_vendedorPro = $producto["margen_vendedorPro"];
                $pro_has_op->ganancia_vendedorPro = $producto["ganancia_vendedor"];
                $pro_has_op->utilidadPro = $producto["utilidadPro"];
                $pro_has_op->numero_meses = $producto["numero_meses"];
                $pro_has_op->precio_mes = $producto["precioxmes"];
                $pro_has_op->comercializacion_producto_idcomercializacion_producto = $producto["comercializacionproducto_id"];
                $pro_has_op->cantidad_productos = $producto['cantidad_productos'];
                $pro_has_op->save();
                $contador++;
            }
            $cont_pro = count($productos);
        }
        if($contador == $cont_pro){
            toast('Productos Añadidos exitosamente','success');
            return 0;
        }else{
            toast('Error al añadir los productos','warning');
            return 0;
        }
    }
        //guardar los servicios añadidos
        public function añadirSer_store(Request $request){
            $negocio = $request['negocio']; //
            $servicios = $request['servicios'];
            $contador = 0;
            if($servicios != ""){
                foreach($servicios as $servicio){
                    $op_has_ser = new OportunidadNegocioHasServicio();
                    $op_has_ser->servicio_idservicio = $servicio["servicio_id"];
                    $op_has_ser->oportunidad_negocio_idNegocio = $negocio[0];
                    $op_has_ser->conocimiento_servicio_idconocimiento_servicio = $servicio["conocimiento_id"];
                    $op_has_ser->comercializacion_servicio_idcomercializacion_servicio = $servicio["comercializacionservicio_id"];
                    $op_has_ser->costo_hora = $servicio["costoxhora"];
                    $op_has_ser->cantidad_horas = $servicio["cantidad_hora"];
                    $op_has_ser->costo_totalSer = $servicio["costo_total"];
                    $op_has_ser->margen_negocioSer = $servicio["margen_negocioSer"];
                    $op_has_ser->valor_total_cliente = $servicio["precioSventa"];
                    $op_has_ser->utilidadSer = $servicio["utilidadSer"];
                    $op_has_ser->margen_vendedorSer = $servicio["margen_vendedorSer"];
                    $op_has_ser->comentarios = $servicio["comentario"];
                    $op_has_ser->meses = $servicio["meses"];
                    $op_has_ser->costo_total_mes = $servicio["costo_total_mes"];
                    $op_has_ser->valor_cliente_hora = $servicio["valor_cliente_hora"];
                    $op_has_ser->valor_venta_mes = $servicio["valor_venta_mes"];
                    $op_has_ser->ganancia_vendedorSer = $servicio["ganancia_vendedorSer"];
                    $op_has_ser->ganancia_vendedorSer_clp = $servicio["ganancia_vendedorSer_clp"];
                    $op_has_ser->costo_totalSer_clp = $servicio["costo_totalSer_clp"];
                    $op_has_ser->costo_total_mes_clp = $servicio["costo_total_mes_clp"];
                    $op_has_ser->save();
                    $contador++;
                }
                $cont_ser = count($servicios);
            }
            if($contador == $cont_ser){
                toast('Servicios Añadidos exitosamente','success');
                return 0;
            }else{
                toast('Error al añadir los servicios','warning');
                return 0;
            }
        }
    public function store_negocio_f3(){
        return 'archivos';
    }

    public function getComercializacion($id){
        $comercializacion = DB::table('producto')
        ->join('tipo_producto_has_comercializacion_producto','producto.tipo_producto_idtipo_producto','tipo_producto_has_comercializacion_producto.tipo_producto_idtipo_producto')
        ->join('comercializacion_producto','comercializacion_producto.idcomercializacion_producto','tipo_producto_has_comercializacion_producto.comercializacion_producto_idcomercializacion_producto')
        ->where('producto.idproducto',$id)
        ->select('comercializacion_producto.idcomercializacion_producto','nombre_comercializacion')
        ->get();
        return $comercializacion;
    }

    //mostrar Negocios
    public function VerNegocios(){
        $negocios = OportunidadNegocio::all();
        return view("Negocio.NegociosView",compact("negocios"));
    }

    public function verProAsociado($idNegocio){
        $pro_has_op = DB::table('producto_has_oportunidad_negocio')
        ->join('producto','idproducto','=','producto_idproducto')
        ->join('comercializacion_producto','idcomercializacion_producto','=','comercializacion_producto_idcomercializacion_producto')
        ->where('oportunidad_negocio_idNegocio',$idNegocio)->get();
        return view('Negocio.ProAsoc',compact('pro_has_op','idNegocio'));
    }

    public function verSerAsociado($idNegocio){
        $ser_has_op = DB::table('oportunidad_negocio_has_servicio')
        ->join('servicio','idservicio','=','servicio_idservicio')
        ->join('comercializacion_servicio','idcomercializacion_servicio','=','comercializacion_servicio_idcomercializacion_servicio')
        ->join('conocimiento_servicio','idconocimiento_servicio','=','conocimiento_servicio_idconocimiento_servicio')
        ->where('oportunidad_negocio_idNegocio',$idNegocio)->get();
        return view('Negocio.SerAsoc',compact('ser_has_op','idNegocio'));
    }

    public function verParAsociado($idNegocio){
        $user_participa = DB::table('users')
        ->join('usuario_participa_oportunidad_negocio','usuario_participa_oportunidad_negocio.usuario_rut','=','users.rut')
        ->join('rol','rol.idRol','=','users.rol_idRol')
        ->where('usuario_participa_oportunidad_negocio.oportunidad_negocio_idoportunidad_negocio','=',$idNegocio)
        ->get();
        return view('Negocio.PartAsoc',compact('user_participa','idNegocio'));
    }
    //archivos

    public function archivos(Request $request){
        if($request->documento == ""){
            return redirect('/verNegocios')->with('success','Creación del negocio finalizada');
        }else{
            $documento = $request->file('documento');
            for ($i=0; $i < count($documento); $i++) { 
                $archivo = new Documento();
                $archivo->nombre_doc = $documento[$i]->getClientOriginalName();
                $archivo->url = $documento[$i]->storeAs('uploads',$documento[$i]->getClientOriginalName());
                $archivo->fecha_subida = date('Y-m-d');
                $archivo->oportunidad_negocio_idoportunidad_negocio = $request->idnegocio;
                try{
                    $archivo->save();
                }catch(Exception $e){
                    return $e->getMessage();
                }
            }
            //cambiar fase del negocio
            $estado = Estado::where('nombre_estado','=','Fase 3:Subida de archivos y finalización creación')->first();
            $negocio = OportunidadNegocio::where('idNegocio',$request->idnegocio)->first();
            $negocio->estado_idestado = $estado->idEstado;
            //fin
            if( $negocio->save()){
             return redirect('/verNegocios')->with('success','Subida de documento y creación del negocio realizado con exito');
            }else{
                return back()->with('warning','Error al subir el documento');    
            } 
        }
    }

    public function verDocAsociado($idNegocio){
        $documentos =Documento::where('oportunidad_negocio_idoportunidad_negocio','=',$idNegocio)->get();
        return view('Negocio.DocAsoc',compact('documentos','idNegocio'));
    }

    public function verArchivo(Documento $documento){
        return Storage::download($documento->url);
    }
//Editar Producto//

    public function edit_pro($id_pro_has_op){
        $pro_has_op = ProductoHasOportunidadNegocio::where('id_pro_has_op',$id_pro_has_op)->first();
        $comercializacion = ComercializacionProducto::where('idcomercializacion_producto',$pro_has_op->comercializacion_producto_idcomercializacion_producto)->first();
        $producto = Producto::where('idproducto',$pro_has_op->producto_idproducto)->first();
        return view('Negocio.editPro',compact('pro_has_op','producto','comercializacion'));
    }

    public function editar_producto(ProductoHasOportunidadNegocio $pro_has_op,Request $request){

        $pro_has_op->costo_producto = $request->precioPcosto;
        $pro_has_op->precio_ventaPro = $request->precioPventa;
        $pro_has_op->cantidad_productos = $request->cantidad_productos;
        $pro_has_op->margen_negocioPro = $request->margen_negocioPro;
        $pro_has_op->margen_vendedorPro = $request->margen_vendedorPro;
        $pro_has_op->ganancia_vendedorPro = $request->ganancia;
        $pro_has_op->utilidadPro = $request->utilidadPro;
        $pro_has_op->numero_meses = $request->meses;
        $pro_has_op->precio_mes = $request->preciomes;
        if($pro_has_op->save()){
            toast('Valores editados correctamente','success');
            return redirect('/verNegocios');
        }else{
            toast('No se pudo editar los valores');
            return redirect('/verNegocios');
        }
    }
    
    public function edit_Ser($id_ser_has_op){
        $ser_has_op = OportunidadNegocioHasServicio::where('id_ser_has_op',$id_ser_has_op)->first();
        $comercializacion = ComercializacionServicio::where('idcomercializacion_servicio',$ser_has_op->comercializacion_servicio_idcomercializacion_servicio)->first();
        $servicio = Servicio::where('idservicio',$ser_has_op->servicio_idservicio)->first();
        $conocimiento = ConocimientoServicio::where('idconocimiento_servicio',$ser_has_op->conocimiento_servicio_idconocimiento_servicio)->first();
        return view('Negocio.editSer',compact('ser_has_op','servicio','comercializacion','conocimiento'));
    }

    public function editar_servicio(OportunidadNegocioHasServicio $ser_has_op,Request $request){

        $ser_has_op->costo_hora = $request->costoxhora ;
        $ser_has_op->cantidad_horas =$request->cantidad_hora;
        $ser_has_op->margen_NegocioSer = $request->margen_negocioSer;
        $ser_has_op->valor_total_cliente = $request->precioSventa ;
        $ser_has_op->valor_total_cliente_clp = $request->valor_total_cliente_clp ;
        $ser_has_op->costo_totalSer =  $request->costo_total;
        $ser_has_op->margen_vendedorSer = $request->margen_vendedorSer;
        $ser_has_op->valor_venta_mes = $request->valor_venta_mes ;
        $ser_has_op->meses = $request->n_meses;
        $ser_has_op->costo_total_mes = $request->costo_total_mes ;
        $ser_has_op->valor_cliente_hora = $request-> valor_cliente_hora;
        $ser_has_op->ganancia_vendedorSer = $request->ganancia_vendedorSer ;
        $ser_has_op->ganancia_vendedorSer_clp = $request->gananciaSer ;
        $ser_has_op->costo_totalSer_clp = $request->costo_totalSer_clp;
        $ser_has_op->costo_total_mes_clp = $request->costo_total_mes_clp ;
        $ser_has_op->utilidadSer = $request->utilidadSer;


        if($ser_has_op->save()){
            toast('Valores de servicio editados correctamente','success');
            return redirect('/verNegocios');
        }else{
            toast('Error al editar los valores','warning');
            return redirect('/verNegocios');
        }
    }

//AÑADIR PRO SER PAR Y DOCS EN UN NEGOCIO YA CREADO
    public function añadirPro_view($idNegocio){
        $idNegocio = $idNegocio;
        $productos = Producto::all();
        $comercializaciones = ComercializacionProducto::all();
        return view('Negocio.AñadirPro',compact('productos','comercializaciones','idNegocio'));
    }

    public function añadirSer_view($idNegocio){
        $servicios = Servicio::all();
        $conocimientos = ConocimientoServicio::all();
        $comercializacionSer = ComercializacionServicio::all();
        return view('Negocio.AñadirSer',compact('servicios','comercializacionSer','conocimientos','idNegocio'));
    }

    public function añadirPar_view( $idNegocio){
        $users = User::all();
        $participantes = DB::table('usuario_participa_oportunidad_negocio')
        ->where('oportunidad_negocio_idoportunidad_negocio','=',$idNegocio)->get();
        $usuarios = array();

        foreach ($users as $user) {
            $existe = 0;
            foreach($participantes as $participante){
                if($participante->usuario_rut == $user->rut){
                    $existe = 1;
                } 
            }
            if($existe == 0){
                array_push($usuarios, $user);
            }
        }
        $creador = DB::table('oportunidad_negocio')->where('idNegocio',$idNegocio)->first();
        $rut = $creador->usuario_rut;
        return view('Negocio.AñadirPar',compact('idNegocio','usuarios','rut'));
    }


    public function añadirPar_store(Request $request){
        
        
        return $request;
        $cont =0;
        foreach ($request->participante as $par) {
            $nuevo = new UsuarioParticipaON();
            $nuevo->usuario_rut = $par;
            $nuevo->oportunidad_negocio_idoportunidad_negocio = $request->idnegocio;

            try{
                $nuevo->save();
                $cont++;
            }catch(Exception $e){
                toast('Error al añadir participantes','warning',);
                return view('Negocio.NegociosView');
            }
        }
                $negocios = OportunidadNegocio::all();
        if($cont == count($request->participante)){
            $negocios = OportunidadNegocio::all();
            toast('Participantes añadidos exitosamente','success');
            return view('Negocio.NegociosView',compact('negocios'));
        }
 
    }    
    public function añadirDoc_view($idNegocio){
        return view('Negocio.AñadirDoc',compact('idNegocio'));
    }
    public function añadirDoc_store(Request $request){
        $documento = $request->file('documento');
        for ($i=0; $i < count($documento); $i++) { 
            $archivo = new Documento();
            $archivo->nombre_doc = $documento[$i]->getClientOriginalName();
            $archivo->url = $documento[$i]->storeAs('uploads',$documento[$i]->getClientOriginalName());
            $archivo->fecha_subida = date('Y-m-d');
            $archivo->oportunidad_negocio_idoportunidad_negocio = $request->idnegocio;
            try{
                $archivo->save();
            }catch(Exception $e){
                return $e->getMessage();
            }
        }
        if($i == count($documento)){
            return redirect('/verNegocios')->with('success','Documentos añadidos exitosamente');
        }else{
            return redirect('/verNegocios')->with('warning','Error al añadir los documentos');
        }
    }
}
