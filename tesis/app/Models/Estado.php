<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';
    protected $primaryKey = 'idEstado';
    protected $fillable = ['idEstado','nombre_estado'];
    public $timestamps = false;
}
