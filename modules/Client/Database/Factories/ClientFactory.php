<?php

declare(strict_types=1);

namespace Modules\Client\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Client\Models\Client;

/**
 * @extends Factory<Client>
 */
class ClientFactory extends Factory
{
    protected $model = Client::class;

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
