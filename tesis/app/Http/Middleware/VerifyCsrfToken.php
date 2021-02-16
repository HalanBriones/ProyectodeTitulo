<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
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
        "/delete/usuario"
    ];
}
