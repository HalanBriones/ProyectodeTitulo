<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Servicio;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    public function graficos(){
        $productos = Producto::all();
        $servicios= Servicio::all();
        return $productos;
    }
}
