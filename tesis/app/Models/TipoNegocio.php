<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoNegocio extends Model
{
    protected $table = 'tipo_negocio';
    protected $primaryKey = 'idTipoNegocio';
    protected $fillable = ['idTipoNegocio','nombre_tipo_negocio'];
    public $timestamps = false;
}
