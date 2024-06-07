<?php

namespace Database\Seeders;

use App\Models\Emplayabilite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmplayabiliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Emplayabilite::factory()->count(100)->create();
    }
}
