<?php

namespace App\Providers;

use App\Http\View\Composers\JsByControllerComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Aplica el composer a todas las views
        View::composer('*', JsByControllerComposer::class);
    }
}
