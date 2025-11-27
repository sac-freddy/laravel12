<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CotizacionController extends Controller
{
    /*public function showCotizacionesJSON()
    {
        $data = Cotizacion::getCotizaciones();
        if ($data->isNotEmpty()) {
            return response()->json([
                'data' => $data,
                'message' => 'Cotizaciones cargadas correctamente'
            ]);
        } else {
            return response()->json([
                'message' => 'No se encontraron cotizaciones'
            ], 404);
        }
    }*/
    public function showCotizacionesJSON()
    {
         $data = Cotizacion::getCotizaciones()->paginate(4);

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
        'message' => 'Cotizaciones cargadas correctamente'
    ]);
    }


    //*************************************************************************/ 
    public function index()
    {
        $cotizaciones = Cotizacion::orderBy('id', 'desc')->paginate(10);

        // Indicamos cuál módulo está activo para Vue
        return view('cotizaciones.index', [
            'cotizaciones' => $cotizaciones,
            'moduloActivo' => 'index', // 🔹 aquí se define
        ]);
    }
    //*************************************************************************/
    public function show(Cotizacion $cotizacion)
    {
        $data = [
            'cotizacion' => $cotizacion,
        ];
        return view('cotizaciones.show', compact('cotizacion', 'data'));
    }
    //*************************************************************************/
    public function listarCotizaciones()
    {
        $cotizaciones = Cotizacion::orderBy('id', 'desc')->paginate();

        $data = [
            'cotizaciones' => $cotizaciones,
        ];
        return view('mantenimiento.cotizaciones.listar', compact('cotizaciones', 'data'));
    }
    //*************************************************************************/
    public function crearCotizacion()
    {
        return view('cotizaciones.crear');
    }
    //******************************************* */

    public function editarCotizacion(Cotizacion $cotizacion)
    {
        return view('cotizaciones.editar', compact('cotizacion'));
    }
    //******************************************* */
    public function actualizarCotizacion(Request $request, Cotizacion $cotizacion)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);

        $request->merge([
            'slug' => Str::slug($request->nombre),
        ]);

        // Validar y actualizar la imagen si se selecciona una nueva
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen antigua si existe
            if ($cotizacion->imagen) {
                Storage::delete('public/cotizaciones_images/' . $cotizacion->imagen);
            }

            // Almacenar la nueva imagen
            $imagenNombre = uniqid() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $imagenPath = $request->file('imagen')->storeAs('public/cotizaciones_images', $imagenNombre);

            // Actualizar el nombre de la imagen en la base de datos
            $cotizacion->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'categoria' => $request->categoria,
                'slug' => Str::slug($request->nombre),
                'imagen' => $imagenNombre,
            ]);
        } else {
            // Si no se selecciona una nueva imagen, actualizar los demás campos
            $cotizacion->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'categoria' => $request->categoria,
                'slug' => Str::slug($request->nombre),
            ]);
        }

        return redirect()->route('cotizaciones.listarCotizaciones');
    }
    //******************************************* */
    public function destroy(Cotizacion $cotizacion)
    {
        $cotizacion->delete();
        return redirect()->route('cotizaciones.index');
    }
}
