<?php

declare(strict_types=1);

namespace Modules\Client\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Client\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::factory()->count(50)->create();
    }
}
