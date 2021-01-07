<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubComercializacion extends Model
{
    protected $table = 'sub_comercializacion';
    protected $primaryKey= 'idsub_comercializacion';
    protected $fillable = [
        'nombre_subcomer'
    ];
}
