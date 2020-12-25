<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = 'tipo_producto';
    protected $primaryKey = 'idTipoProducto';
    protected $fillable = [
        'idTipoProducto',
        'nombre_tipo_producto'
    ];
    public $timestamps = false;
}
