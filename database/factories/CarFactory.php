<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CarFactory extends Factory
{
    public function definition()
    {
        $path = Str::random(50).'.jpeg';
        Storage::put($path, File::get(public_path('random.jpeg')), 'private');
        return [
            'name' => fake()->name(),
            'description' => fake()->sentence(10),
            'file' => $path,
            'type' => fake()->numberBetween(1,3)
        ];
    }
}
