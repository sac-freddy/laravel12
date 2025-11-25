<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    //Laravel utiliza convenciones de nomenclatura en inglés para interactuar con la base de datos. Si nuestra tabla esta en singular, la debemos especificar
    protected $table = 'cabcotizacion';

    //protected $fillable = ['nombre', 'descripcion', 'categoria', 'imagen'];

    protected $guarded = [];

    public $timestamps = false; // Deshabilitar timestamping


   
    
}
