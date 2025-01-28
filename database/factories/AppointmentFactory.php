<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Consultant\Models\Consultant;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $consultant = Consultant::query()->inRandomOrder()->first() ?? Consultant::factory()->create();
        $client = Client::query()->inRandomOrder()->first() ?? Client::factory()->create();

        return [
            'consultant_id' => $consultant->id,
            'client_id' => $client->id,
            'appointment_date' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
