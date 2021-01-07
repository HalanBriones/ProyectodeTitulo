<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mac extends Model
{
    protected $table = 'mac';
    protected $primaryKey = 'idMac';
    protected $fillable = [
        'idMac',
        'nombre_marca'
    ];
    public $timestamps = false;
}
