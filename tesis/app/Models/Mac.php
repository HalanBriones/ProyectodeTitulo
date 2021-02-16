<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mac extends Model
{
    use SoftDeletes ;
    protected $date = ['deleted_at'];
    protected $table = 'mac';
    protected $primaryKey = 'idMac';
    protected $fillable = [
        'idMac',
        'deleted_at',
        'nombre_marca'
    ];
    public $timestamps = false;
}
