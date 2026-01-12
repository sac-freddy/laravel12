<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\table;

class Articulo extends Model
{
    protected $table = 'articulo';
//hola


    public static function getArticulos()
    {
        $resultado = self::select(
            'articulo.*',
            //'cliente.descripcion AS nombre_cliente'
        )
            //->join('cliente', 'cliente.id', '=', 'cabcotizacion.cliente_id')
            ->orderBy('articulo.id', 'DESC');

        return $resultado;
    }
}
