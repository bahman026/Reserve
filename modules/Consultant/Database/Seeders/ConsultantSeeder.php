<?php

declare(strict_types=1);

namespace Modules\Consultant\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Consultant\Models\Consultant;

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
