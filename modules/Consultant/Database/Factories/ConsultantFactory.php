<?php

declare(strict_types=1);

namespace Modules\Consultant\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Consultant\Models\Consultant;

/**
 * @extends Factory<Consultant>
 */
class ConsultantFactory extends Factory
{
    protected $model = Consultant::class;

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
