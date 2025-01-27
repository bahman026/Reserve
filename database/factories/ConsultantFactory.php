<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consultant>
 */
class ConsultantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fake = \Faker\Factory::create('fa_IR');

        return [
            'full_name' => $fake->firstName . ' ' . $fake->lastName,
            'email' => $fake->unique()->safeEmail,
        ];
    }
}
