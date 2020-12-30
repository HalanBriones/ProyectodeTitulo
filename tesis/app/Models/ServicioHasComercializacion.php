<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioHasComercializacion extends Model
{
    protected $table = 'servicio_has_comercializacionservicio';
    protected $fillable = [
        'idComer_servicio',
        'idServicio'
    ];
    public $timestamps = false;
}
