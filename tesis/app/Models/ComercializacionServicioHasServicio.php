<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComercializacionServicioHasServicio extends Model
{
    protected $table = 'comercializacion_servicio_has_servicio';
    protected $fillable = [
        'comercializacion_servicio_idcomercializacion_servicio',
        'servicio_idservicio'
    ];
    public $timestamps = false;
}
