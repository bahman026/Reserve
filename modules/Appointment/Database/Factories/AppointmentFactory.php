<?php

declare(strict_types=1);

namespace Modules\Appointment\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Appointment\Models\Appointment;
use Modules\Client\Models\Client;
use Modules\Consultant\Models\Consultant;

/**
 * @extends Factory<Appointment>
 */
class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

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
