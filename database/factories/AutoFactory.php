<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Auto;

class AutoFactory extends Factory
{
    protected $model = Auto::class;

    public function definition(): array
    {
        return [
            'marca' => $this->faker->company,
            'modelo' => $this->faker->word,
            'anio' => $this->faker->year,
            'color' => $this->faker->safeColorName,
            'precio' => $this->faker->randomFloat(2, 5000, 50000),
            'kilometraje' => $this->faker->numberBetween(0, 200000),
            'user_id' => 1,
        ];
    }
}
