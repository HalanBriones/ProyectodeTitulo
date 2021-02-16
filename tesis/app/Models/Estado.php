<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use SoftDeletes ;
    protected $date = ['deleted_at'];
    protected $table = 'estado';
    protected $primaryKey = 'idEstado';
    protected $fillable = ['idEstado','deleted_at','nombre_estado'];
    public $timestamps = false;
}
