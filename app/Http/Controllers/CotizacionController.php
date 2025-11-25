<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CotizacionController extends Controller
{
//*************************************************************************/ 
    public function index(){
        $cotizaciones = Cotizacion::orderBy('id', 'desc')->paginate();
   
        $data = [
            'cotizaciones' => $cotizaciones,
        ];
        return view('cotizaciones.index', compact('cotizaciones', 'data'));
    }
//*************************************************************************/
    public function show(Cotizacion $cotizacion){
        $data = [
            'cotizacion' => $cotizacion,
        ];
        return view('cotizaciones.show', compact('cotizacion', 'data'));
    }
//*************************************************************************/
    public function listarCotizaciones(){
        $cotizaciones = Cotizacion::orderBy('id', 'desc')->paginate();
  
        $data = [
            'cotizaciones' => $cotizaciones,
        ];
        return view('mantenimiento.cotizaciones.listar', compact('cotizaciones', 'data'));
    }
//*************************************************************************/
    public function crearCotizacion(){
        return view('cotizaciones.crear');
    }
//******************************************* */
    /*public function store(StoreCotizacion $request){
        // Validar y almacenar la imagen
        if ($request->hasFile('imagen')) {
            $imagenNombre = uniqid() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $imagenPath = $request->file('imagen')->storeAs('public/cotizaciones_images', $imagenNombre);
        } else {
            $imagenPath = null; // Si no se selecciona una imagen, asigna null
        }
    
        // Crear el cotizacion con los datos del formulario
        $cotizacion = new Cotizacion([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'slug' => Str::slug($request->nombre),
            'imagen' => $imagenNombre, // Asignar solo el nombre de la imagen
        ]);
    
        $cotizacion->save();
    
        return redirect()->route('cotizaciones.show', $cotizacion);
    }*/
//******************************************* */
    
    public function editarCotizacion(Cotizacion $cotizacion){
        return view('cotizaciones.editar', compact('cotizacion'));
    }
    //******************************************* */
    public function actualizarCotizacion(Request $request, Cotizacion $cotizacion){
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
    public function destroy(Cotizacion $cotizacion){
        $cotizacion->delete(); 
        return redirect()->route('cotizaciones.index');
    }
}
