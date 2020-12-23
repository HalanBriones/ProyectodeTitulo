<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMoneda extends Model
{
    protected $table = 'tipo_moneda';
    protected $primaryKey = 'idMoneda';
    protected $fillable = ['idMoneda','nombre','transformacion'];
    public $timestamps = false;
}
