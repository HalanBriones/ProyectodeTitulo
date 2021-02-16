<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use SoftDeletes ;
    protected $date = ['deleted_at'];
    protected $table = 'rol';
    protected $primaryKey = 'idRol';
    protected $fillable = [
        'idRol',
        'deleted_at',
        'nombre_rol'
    ];
}
