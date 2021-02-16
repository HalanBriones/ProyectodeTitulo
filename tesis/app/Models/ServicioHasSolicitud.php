<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioHasSolicitud extends Model
{
    use HasFactory;
    protected $table = 'servicio_has_solicitud';
    public $timestamps = false;
}
