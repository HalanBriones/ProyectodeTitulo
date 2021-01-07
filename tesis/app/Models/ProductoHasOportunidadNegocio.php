<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoHasOportunidadNegocio extends Model
{
    protected $table = 'producto_has_oportunidad_negocio';
    protected $fillable = [
        'costo_producto',
        'precio_ventaPro',
        'configuracion',
        'sku',
        'partNumber',
        'margen_negocioPro',
        'margen_vendedorPro',
        'ganancia_vendedorPro',
        'utilidadPro',
        'comercializacion_idcomercializacion'

    ];
}
