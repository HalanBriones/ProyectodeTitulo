<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComercializacioServicioHasServicio extends Model
{
    protected $table = 'comercializacion_servicio_has_servicio';
    protected $fillable = [
        'comercializacon_servicio_idcomercializacon_servicio',
        'servicio_idservicio'
    ];
    public $timestamps = false;
}
