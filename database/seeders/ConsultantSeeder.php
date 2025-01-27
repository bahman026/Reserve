<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Consultant;
use Illuminate\Database\Seeder;

class ConsultantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Consultant::factory()->count(50)->create();
    }
}
