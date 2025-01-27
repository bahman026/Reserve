<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Consultant;
use Illuminate\Database\Eloquent\Factories\Factory;

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
