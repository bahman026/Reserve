<?php

declare(strict_types=1);

namespace Modules\Client\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Client\Models\Client;
use Tests\TestCase;

class ClientFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_client(): void
    {
        $data = [
            'full_name' => 'John Doe',
            'email' => 'john@example.com',
        ];

        $response = $this->postJson(route('clients.store'), $data);

        $response->assertStatus(201)
            ->assertJson([
                'message' => trans('client::client.client_created_successfully'),
                'client' => [
                    'full_name' => 'John Doe',
                    'email' => 'john@example.com',
                ],
            ]);

        $this->assertDatabaseHas('clients', [
            'full_name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    }

    public function test_it_can_fetch_a_list_of_clients(): void
    {
        Client::factory()->hasAppointments(2)->count(3)->create();

        $response = $this->getJson(route('clients.index'));

        $response->assertStatus(200)
            ->assertJsonStructure([

                '*' => [
                    'id',
                    'full_name',
                    'email',
                    'appointments' => [
                        '*' => [
                            'id',
                            'appointment_date',
                            'consultant' => [
                                'id',
                                'full_name',
                                'email',
                            ],
                        ],
                    ],
                ],

            ]);
    }

    public function test_it_can_fetch_a_single_client(): void
    {
        $client = Client::factory()->hasAppointments(1)->create();

        $response = $this->getJson(route('clients.show', $client));

        $response->assertStatus(200)
            ->assertJson([
                'id' => $client->id,
                'full_name' => $client->full_name,
                'email' => $client->email,
                'appointments' => [
                    [
                        'id' => $client->appointments->first()->id,
                        'appointment_date' => $client->appointments->first()->appointment_date,
                        'consultant' => [
                            'id' => $client->appointments->first()->consultant->id,
                            'full_name' => $client->appointments->first()->consultant->full_name,
                            'email' => $client->appointments->first()->consultant->email,
                        ],
                    ],
                ],
            ]);
    }
}
