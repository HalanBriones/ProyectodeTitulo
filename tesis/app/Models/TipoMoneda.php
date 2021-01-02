<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMoneda extends Model
{
    protected $table = 'moneda';
    protected $primaryKey = 'idMoneda';
    protected $fillable = ['idMoneda','nombre','transformacion'];
    public $timestamps = false;
}
