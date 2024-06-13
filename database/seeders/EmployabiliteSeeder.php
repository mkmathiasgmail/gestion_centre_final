<?php

namespace Database\Seeders;

use App\Models\Employabilite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployabiliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employabilite::factory()->count(100)->create();
    }
}
