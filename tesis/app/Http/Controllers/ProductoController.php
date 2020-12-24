<?php

namespace App\Http\Controllers;

use App\Models\Mac;
use App\Models\Producto;
use App\Models\TipoProductoHW;
use App\Models\TipoProductoSW;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function vistaProductos(){

        //mandar productos
        $productos = Producto::whith('tipo_produto_hw')->whith('tipo_produto_sw')->get();
        return $productos;
        return view('producto.vista',compact('productos'));
    }
    //Mandar datos a la vista crear Productos

    public function vista_creacion_producto(){
        $prohw = TipoProductoHW::all();
        $prosw = TipoProductoSW::all();
        $mac = Mac::all();
        
    }
}
