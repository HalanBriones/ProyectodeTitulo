<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoHasSolicitud extends Model
{
    use HasFactory;
    protected $table = 'producto_has_solicitud';
    public $timestamps = false ;

}
