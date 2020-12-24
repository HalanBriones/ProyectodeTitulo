<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mac extends Model
{
    protected $table = 'mac';
    protected $primaryKey = 'idMarca';
    protected $fillable = [
        'idMarca',
        'nombre_marca'
    ];
    public $timestamps = false;
}
