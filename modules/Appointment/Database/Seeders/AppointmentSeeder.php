<?php

declare(strict_types=1);

namespace Modules\Appointment\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Appointment\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appointment::factory()->count(50)->create();
    }
}
