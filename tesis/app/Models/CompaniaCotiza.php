<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompaniaCotiza extends Model
{
    protected $table = 'compañia_cotiza';
    protected $primaryKey = 'idcompañia_cotiza';
    protected $fillable = [
        'compañia',
        'correo',
        'domicilio',
        'telefono'
    ];
    public $timestamps = false;
}
