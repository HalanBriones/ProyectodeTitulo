<?php

namespace App\Http\Controllers;

use App\Models\Mac;
use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    //vista creacion producto

    public function vistaRegistro_Producto(){
        $macs = Mac::all();
        $tipo_productos = TipoProducto::all();
        return view('Producto.creacionProducto', compact('tipo_productos','macs'));
    }

}
