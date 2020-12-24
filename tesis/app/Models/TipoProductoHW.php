<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProductoHW extends Model
{
    protected $table = 'tipo_producto_hw';
    protected $primaryKey = 'idProHW';
    protected $fillable = [
        'idProHW',
        'nombre_tp_hw'
    ];
    public $timestamps = false;
}
