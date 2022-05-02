<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    use HasFactory;
    protected $table='files'; //usa el nombre de la base de datos 
    protected $fillable = ['name','id_historialclinico'];
}
