<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Usuario::factory()->create([
            'name' => 'Usuario de Prueba',
            'email' => 'usuario@ejemplo.com',
        ]);
        $this->call(\Database\Seeders\UsuarioSeeder::class);
        $this->call(\Database\Seeders\AutoSeeder::class);
    }
}
