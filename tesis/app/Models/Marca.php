<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'mac';
    protected $primaryKey= 'idMac';
    protected $fillable = ['idMac','nombre'];
    public $timestamps = false;

}
