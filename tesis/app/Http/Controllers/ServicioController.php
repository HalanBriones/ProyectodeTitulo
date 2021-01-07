<?php

namespace App\Http\Controllers;
use App\Models\ConocimientoServicio;
use App\Models\Servicio;
use App\Models\ConocimientoServicioHasServicio;
use Illuminate\Http\Request;
use App\Models\ComercializacionServicio;
use App\Models\ServicioHasComercializacion;
use Alert;
use App\Models\ComercializacioServicioHasServicio;
use Symfony\Component\CssSelector\Node\FunctionNode;

class ServicioController extends Controller
{

    //vista creacion producto

    public function vistaRegistro_Servicio(){
        return view('Servicio.creacionServicio');
    }

    public function edit_servicio($idServicio){
        $servicio = Servicio::where('idservicio',$idServicio)->first();
        return view('Servicio.editServicio',compact('servicio'));
    }

    public function update_servicio(Request $request, Servicio $servicio){
        return 'hola';
    }

    public function store_servicio(Request $request){
        request()->validate([
            "nombre_servicio" => "required",
            "descripcion" => "required"
        ]);    
        $sigla_servicio= substr($request->nombre_servicio,0,-4);
        $servicio = new Servicio();
        $servicio->idChileCompra = $request->idChileCompra;
        $servicio->nombre_servicio = $request->nombre_servicio;
        $servicio->descripcion = $request->descripcion;
        $servicio->sigla_servicio = $sigla_servicio;

        $existe = Servicio::where('nombre_servicio',$servicio->nombre_servicio)->first();
         if($existe){
            return back()->with('warning', 'El Producto ya existe');
         }

        if($servicio->save()){
            //enlazar el servicio con todos los tipos de conocimiento

            $conocimientos = ConocimientoServicio::all();
            foreach($conocimientos as $conociemiento){
                $conociemiento_has_servicio = new ConocimientoServicioHasServicio();

                $conociemiento_has_servicio->idConocimiento = $conociemiento->idConocimiento;
                $conociemiento_has_servicio->idServicio = $servicio->idServicio;

                $conociemiento_has_servicio->save();
            }

            //enlazar el servicio con todos los tipos de comercializacion

            $comer = ComercializacionServicio::all();

            foreach($comer as $com)
            {
                $ser_comer = new ComercializacioServicioHasServicio();
                $ser_comer->comercializacon_servicio_idcomercializacon_servicio = $com->idcomer_servicio;
                $ser_comer->servicio_idservicio = $servicio->idservicio;

                $ser_comer->save();
            }

            return redirect('/registroServicio')->with('success','Producto Creado Correctamente');
        }else{
            return redirect('/registroServicio')->whith('warning','Error al crear el servicio');
        }



    }

    public function mostrar_servicios(){
        $servicios = Servicio::all();
        return view('Servicio.servicios',compact('servicios'));
    }


}   