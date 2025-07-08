<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Auto;
use App\Models\Usuario;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $usuario = Usuario::first();
        if ($usuario) {
            Auto::factory()->count(10)->create(['user_id' => $usuario->id]);
        }
    }
}

// Seeder renombrado a AutoSeeder. Este archivo puede eliminarse si ya no se usa.
