<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        "/negocios",
        "/añadirP",
        "/añadirS",
        "/producto",
        "/delete/comerPro",
        "/delete/comerSer",
        "/delete/conocimiento",
        "/delete/estado",
        "/delete/marca",
        "/delete/servicio",
        "/delete/tipo/producto",
        "/delete/usuario",
        "/eliminar/participante",
        "/eliminar/producto",
        "/eliminar/servicio",
        "/cambiar/estado",
        "/solicitud/revision",
        "/graficos/datos"
    ];
}
