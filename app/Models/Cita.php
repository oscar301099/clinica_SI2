<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $table='cita'; //usa el nombre de la base de datos 
    protected $fillable = ['Fecha_cita','Hora_cita','Id_cliente','Id_medico' ];
}
