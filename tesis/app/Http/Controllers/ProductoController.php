<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mac;
use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Http\Request;
use App\Models\ComercializacionProducto;
use App\Models\TipoProductoHasComercializacion;
use Alert;

class ProductoController extends Controller
{

    public static function generateRandomString($length = 5)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    //vista creacion producto
    public function vistaRegistro_Producto(){
        $macs = Mac::all();
        $tipo_productos = TipoProducto::all();
        return view('Producto.creacionProducto', compact('tipo_productos','macs'));
    }

    public function store_producto(Request $request){
        request()->validate([
            "nombre_producto" =>"required | max:255",
            "tipo_producto" => "required",
            "marca" => "required",
            "partnumber" => "required | max:8"
        ]);    
        $sigla_producto= substr($request->nombre_producto,0,-7);
        $producto = new Producto();
        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion = $request->descripcion;
        $producto->sigla_producto = $sigla_producto;
        $producto->mac_idMac = $request->marca;
        //tipo producto
        $cadena = $request->tipo_producto;
        $res = explode(",",$cadena);
        $producto->tipo_producto_idtipo_producto = $res[0]; 
        $producto->partnumber = $request->partnumber;
        $producto->sku = ProductoController::generateRandomString($length = 5);
        if($request->version == ""){
            $producto->modelo = $request->modelo;      
        }
        if($request->modelo == ""){
            $producto->version = $request->version;
        }
        if($producto->save()){
            return redirect('/registroProducto')->with('success','Producto Creado Correctamente');
        }else{
            return redirect('/registroProducto')->with('warning','Error al crear producto');
        }
    }

    public function mostrar_productos(){
        $tipo_productos = TipoProducto::all();
        $productos = Producto::paginate(8);
        return view('Producto.productos', compact('productos','tipo_productos'));
    }

    public function busqueda(Request $request){

        $tipo_productos = TipoProducto::all();
        $nombre_marca = $request->nombre_marca;
        $id_tipo_producto = $request->tipo_producto;
        $nombre_producto = $request->nombre_producto;
        if($nombre_marca =="" && $id_tipo_producto=="" && $nombre_producto==""){
            $tipo_productos = TipoProducto::all();
            $productos = Producto::paginate(8);
            return view('Producto.productos', compact('productos','tipo_productos'));
        }
        if($nombre_marca =="" && $id_tipo_producto==""){
            
            $productos = Producto::where('nombre_producto','like',"%$nombre_producto%")->get();
            return  view('Producto.productos', compact('productos','tipo_productos'));
        }

        if($nombre_producto == "" && $nombre_marca== ""){
            $productos = Producto::where('tipo_producto_idtipo_producto',$id_tipo_producto)->get();
            return  view('Producto.productos', compact('productos','tipo_productos'));
        }
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
        $producto->sigla_producto = substr($request->nombre_producto,0,-7);
        $producto->partnumber = $request->partnumber;
        if($producto->save()){
            return redirect('/productos')->with('success','Producto editado Correctamente');
        }else{
            return redirect('/productos')->with('warning','Error al editar producto');
        }
    }


}
