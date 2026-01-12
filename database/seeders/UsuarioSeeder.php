<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = new Usuario();
        $usuario->name = 'Freddy';
        $usuario->email = 'freddy@sistema.com';
        $usuario->password = Hash::make('123456');
        $usuario->save();

        $usuario = new Usuario();
        $usuario->name = 'Alexa';
        $usuario->email = 'alexa@sistema.com';
        $usuario->password = Hash::make('12345678');
        $usuario->save();
    }
}
