<?php

namespace App\Http\Controllers;

use App\Models\Mac;
use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Http\Request;
use Alert;

class ProductoController extends Controller
{

    //vista creacion producto

    public function vistaRegistro_Producto(){
        $macs = Mac::all();
        $tipo_productos = TipoProducto::all();
        return view('Producto.creacionProducto', compact('tipo_productos','macs'));
    }

    public function store_producto(Request $request){
        request()->validate([
            "nombre_producto" =>"required | max:255",
            "descripcion" =>"required ",
            "tipo_producto" => "required",
            "marca" => "required"
        ]);    

        $sigla_producto= substr($request->nombre_producto,0,-4);
        
        $producto = new Producto();
        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion = $request->descripcion;
        $producto->sigla_producto = $sigla_producto;
        $producto->mac_idMac = $request->marca;
        $producto->tipo_producto_idtipo_producto = $request->tipo_producto;
        
        if($producto->save()){
            return redirect('/registroProducto')->with('success','Producto Creado Correctamente');
        }else{
            return redirect('/registroProducto')->with('warning','Error al crear producto');
        }
    }

    public function mostrar_productos(){
        $productos = Producto::all();

        return view('Producto.productos', compact('productos'));
    }

    public function edit_producto($idProducto){
        $macs = Mac::all();
        $tipo_productos = TipoProducto::all();
        $producto = Producto::with('tipo_producto')->with('mac')->where('idproducto',$idProducto)->first();
        return view('Producto.edit',compact('macs','tipo_productos','producto'));
    }

    public function update_producto(Request $request, Producto $producto){
        $producto->nombre_producto = $request->nombre_producto;
        $producto->tipo_producto_idtipo_producto = $request->tipo_producto;
        $producto->mac_idMac = $request->marca;
        $producto->descripcion = $request->descripcion;
        $producto->sigla_producto = substr($request->nombre_producto,0,-6);
        
        if($producto->save()){
            return redirect('/productos')->with('success','Producto editado Correctamente');
        }else{
            return redirect('/productos')->with('warning','Error al editar producto');
        }
    }


}
