<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NegocioPersonal extends Model
{
    protected $table = 'negocio_personal';
    protected $fillable = [
        'idNegocio',
        'rut',
        'creacion_negocio'
    ];
}
