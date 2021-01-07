<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProductoHasComercializacion extends Model
{
    protected $table = 'tipo_producto_has_comercializacion'; 
    protected $fillable = [
        'tipo_producto_idtipo_producto',
        'comercializacion_idcomercializacion'
    ];
}
