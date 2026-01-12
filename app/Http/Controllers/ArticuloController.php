<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    //*************************************************************************/ 
    public function index()
    {
        $articulos = Articulo::orderBy('id', 'desc')->paginate(10);

        // Indicamos cuál módulo está activo para Vue
        return view('articulos.index', [
            'articulo' => $articulos,
            'moduloActivo' => 'index', // 🔹 aquí se define
        ]);
    }

    public function showArticulosJSON()
    {
        $data = Articulo::getArticulos()->paginate(4);

        return response()->json([
            'data' => $data->items(),
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'next_page_url' => $data->nextPageUrl(),
                'prev_page_url' => $data->previousPageUrl(),
            ],
            'message' => 'Articulos cargadas correctamente'
        ]);
    }
    //*************************************************************************/
    public function listarArticulos()
    {
        $articulos = Articulo::orderBy('id', 'desc')->paginate();

        $data = [
            'articulo' => $articulos,
        ];
        return view('mantenimiento.articulos.listar', compact('articulo', 'data'));
    }
}
