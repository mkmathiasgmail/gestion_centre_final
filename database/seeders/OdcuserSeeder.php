<?php

namespace Database\Seeders;

use App\Models\Odcuser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OdcuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Odcuser::factory()->count(10)->create();
    }
}
