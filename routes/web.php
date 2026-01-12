<?php

use App\Http\Controllers\ArticuloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CotizacionController;

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get('/', HomeController::class);
//Route::get('/', [HomeController::class, 'index']);



/*********************************************/
/* COTIZACIONES ******************************/
/*********************************************/
Route::get('cotizaciones', [CotizacionController::class, 'index'])->name('listarCotizaciones');
Route::get('crearCotizacion', [CotizacionController::class, 'crearCotizacion'])->name('crearCotizacion');
//Route::post('cotizaciones', [CotizacionController::class, 'store'])->name('cotizaciones.store');  
Route::get('cotizaciones/editar/{cotizacion}', [CotizacionController::class, 'editarCotizacion'])->name('editarCotizacion');
Route::put('cotizaciones/{cotizacion}', [CotizacionController::class, 'actualizarCotizacion'])->name('actualizarCotizacion'); 
Route::delete('cotizaciones/{cotizacion}', [CotizacionController::class, 'eliminarCotizacion'])->name('eliminarCotizacion');


Route::get('showCotizacionesJSON', [CotizacionController::class, 'showCotizacionesJSON'])->name('showCotizacionesJSON');



/*********************************************/
/* PEDIDOS ***********************************/
/*********************************************/


/*********************************************/
/* FACTURACION *******************************/
/*********************************************/







/*********************************************/
/* ARTICULOS ******************************/
/*********************************************/
Route::get('articulos', [ArticuloController::class, 'index'])->name('listarArticulos');
Route::get('showArticulosJSON', [ArticuloController::class, 'showArticulosJSON'])->name('showArticulosJSON');