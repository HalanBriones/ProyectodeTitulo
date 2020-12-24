<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoComercializacionPro extends Model
{
    protected $table = 'tipo_comercializacion_pro';
    protected $primaryKey = 'idTcp';
    protected $fillable = [
        'idTcp',
        'nombre_comercializacion'
    ];
    public $timestamps = false;
}
