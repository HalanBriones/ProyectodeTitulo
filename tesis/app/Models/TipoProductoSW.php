<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProductoSW extends Model
{
    protected $table = 'tipo_producto_sw';
    protected $primaryKey = 'idProSW';
    protected $fillable = [
        'idProSW',
        'nombre_tp_sw'
    ];
    public $timestamps = false;
}
