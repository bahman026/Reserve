<?php

declare(strict_types=1);

namespace Modules\Appointment\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Appointment\Models\Appointment;
use Modules\Client\Models\Client;
use Modules\Consultant\Models\Consultant;
use Tests\TestCase;

class AppointmentFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_an_appointment(): void
    {
        $client = Client::factory()->create();
        $consultant = Consultant::factory()->create();

        $data = [
            'client_id' => $client->id,
            'consultant_id' => $consultant->id,
            'appointment_date' => now()->addDay()->toDateTimeString(),
        ];

        $response = $this->postJson(route('appointments.store'), $data);

        $response->assertStatus(201)
            ->assertJson([
                'message' => trans('appointment::appointment.appointment_created_successfully'),
                'appointment' => [
                    'client_id' => $client->id,
                    'consultant_id' => $consultant->id,
                    'appointment_date' => $data['appointment_date'],
                ],
            ]);

        $this->assertDatabaseHas('appointments', $data);
    }

    public function test_it_can_fetch_a_list_of_appointments(): void
    {
        Appointment::factory()
            ->for(Client::factory())
            ->for(Consultant::factory())
            ->count(3)
            ->create();

        $response = $this->getJson(route('appointments.index'));

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'appointment_date',
                    'client' => [
                        'id',
                        'full_name',
                        'email',
                    ],
                    'consultant' => [
                        'id',
                        'full_name',
                        'email',
                    ],
                ],
            ]);
    }

    public function test_it_can_fetch_a_single_appointment(): void
    {
        $appointment = Appointment::factory()
            ->for(Client::factory())
            ->for(Consultant::factory())
            ->create();

        $response = $this->getJson(route('appointments.show', $appointment));

        $response->assertStatus(200)
            ->assertJson([
                'id' => $appointment->id,
                'appointment_date' => $appointment->appointment_date->format('Y-m-d H:i:s'),
                'client' => [
                    'id' => $appointment->client->id,
                    'full_name' => $appointment->client->full_name,
                    'email' => $appointment->client->email,
                ],
                'consultant' => [
                    'id' => $appointment->consultant->id,
                    'full_name' => $appointment->consultant->full_name,
                    'email' => $appointment->consultant->email,
                ],
            ]);
    }

}
