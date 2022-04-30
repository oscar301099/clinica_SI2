<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class especialidad extends Model
{
    use HasFactory;
    protected $table='especialidad'; //usa el nombre de la base de datos 
    protected $fillable = ['descripcion','id_medico'];
}
