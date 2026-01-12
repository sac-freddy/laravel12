<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = new Menu();
        $menu->descripcion = 'Mantenimiento';
        $menu->save();

        $menu = new Menu();
        $menu->descripcion = 'Ventas';
        $menu->save();

        $menu = new Menu();
        $menu->descripcion = 'Almacen';
        $menu->save();

        $menu = new Menu();
        $menu->descripcion = 'Finanzas';
        $menu->save();

        $menu = new Menu();
        $menu->descripcion = 'Reportes';
        $menu->save();
    }
}
