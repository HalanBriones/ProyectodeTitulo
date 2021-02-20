<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioParticipaON extends Model
{
    protected $table = 'usuario_participa_oportunidad_negocio';
    protected $primaryKey = 'iduser_has_rut';
    protected $fillable = [
        'usuario_rut',
        'oportunidad_negocio_idoportunidad_negocio'
    ];
    public $timestamps = false;
}
