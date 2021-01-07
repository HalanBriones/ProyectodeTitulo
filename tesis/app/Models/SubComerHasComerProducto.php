<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubComerHasComerProducto extends Model
{
    protected $table = 'sub_comer_has_comerc_producto';
    protected $fillable = [
        'sub_comercializacion_idsub_comercializacion',
        'comercializacion_idcomercializacion'
    ];
}
