<?php

declare(strict_types=1);

namespace Modules\Consultant\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Consultant\Models\Consultant;
use Tests\TestCase;

class ConsultantFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_consultant(): void
    {
        $data = [
            'full_name' => 'Jane Smith',
            'email' => 'jane@example.com',
        ];

        $response = $this->postJson(route('consultants.store'), $data);

        $response->assertStatus(201)
            ->assertJson([
                'message' => trans('consultant::consultant.consultant_created_successfully'),
                'consultant' => [
                    'full_name' => 'Jane Smith',
                    'email' => 'jane@example.com',
                ],
            ]);

        $this->assertDatabaseHas('consultants', [
            'full_name' => 'Jane Smith',
            'email' => 'jane@example.com',
        ]);
    }

    public function test_it_can_fetch_a_list_of_consultants(): void
    {
        Consultant::factory()->hasAppointments(2)->count(3)->create();

        $response = $this->getJson(route('consultants.index'));

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
                            'client' => [
                                'id',
                                'full_name',
                                'email',
                            ],
                        ],
                    ],
                ],
            ]);
    }

    public function test_it_can_fetch_a_single_consultant(): void
    {
        $consultant = Consultant::factory()->hasAppointments(1)->create();

        $response = $this->getJson(route('consultants.show', $consultant));

        $response->assertStatus(200)
            ->assertJson([
                'id' => $consultant->id,
                'full_name' => $consultant->full_name,
                'email' => $consultant->email,
                'appointments' => [
                    [
                        'id' => $consultant->appointments->first()->id,
                        'appointment_date' => $consultant->appointments->first()->appointment_date,
                        'client' => [
                            'id' => $consultant->appointments->first()->client->id,
                            'full_name' => $consultant->appointments->first()->client->full_name,
                            'email' => $consultant->appointments->first()->client->email,
                        ],
                    ],
                ],
            ]);
    }
}
