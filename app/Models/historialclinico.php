<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historialclinico extends Model
{
    use HasFactory;
    protected $table='historialclinico'; //usa el nombre de la base de datos 
    protected $fillable = ['id','actividad','alergias','Fecha_ingreso','Fecha_salida','enfermedad','medicamentos','Id_cliente','Id_medico' ];

    
}
