<?php

namespace Database\Seeders;

use App\Models\TypeEvent;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeEvent::create(['title' => 'Formation',  'code' => 'FORM']);
        TypeEvent::create(['title' => 'Conférence', 'code' => 'CONF']);
        TypeEvent::create(['title' => 'Atélier',    'code' => 'ATEL']);
        TypeEvent::create(['title' => 'Open lab',   'code' => 'OLAB']);
        TypeEvent::create(['title' => 'Fab café',   'code' => 'FCAF']);
        TypeEvent::create(['title' => 'Parcours',   'code' => 'PARC']);
        TypeEvent::create(['title' => 'Stage',      'code' => 'STAG']);
        TypeEvent::create(['title' => 'Evenement',  'code' => 'EVEN']);
        TypeEvent::create(['title' => 'Talk',       'code' => 'TALK']);
        TypeEvent::create(['title' => 'Competition','code' => 'COMP']);
        TypeEvent::create(['title' => 'Master Class','code' => 'MACL']);
        TypeEvent::create(['title' => 'Super codeur', 'code' => 'SUCO']);
        TypeEvent::create(['title' => 'Maker junior', 'code' => 'MAJU']);
    }
}
