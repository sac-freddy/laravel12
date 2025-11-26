<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class JsByControllerComposer
{
    public function compose(View $view)
    {
        $route = Route::current();

        if (!$route) {
            return; // por si es consola o error 404
        }

        $controller = class_basename($route->getController());
        $action = $route->getActionMethod();

        $jsFile = null;

        // MAPEOS (ejemplo)
        if ($controller === 'CabcotizacionController' && $action !== 'index') {
            $jsFile = 'js/util/vueCotizacion.js';
        }

        if ($controller === 'CotizacionController') {
            $jsFile = 'js/util/vueCotizacion.js';
        }

        if ($controller === 'ClienteController') {
            $jsFile = 'js/util/vueClientes.js';
        }

        // se envía a TODAS las vistas
        $view->with('vueJsFile', $jsFile);
    }
}
