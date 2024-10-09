<?php

namespace App\Console\Commands;

use Database\Seeders\TypeEventSeeder;
use Illuminate\Console\Command;

class SeedTypeEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:seed-type-event';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commande pour executer des seeders TypeEvent';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Démarrage du seeder pour les types d\'événements...');

        $this->call('db:seed', ['--class' => 'TypeEventSeeder']);

        $this->info('Seeder pour les types d\'événements exécuté avec succès.');
    }
}
