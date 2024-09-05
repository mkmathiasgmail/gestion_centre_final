<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class CreateSuperAdmin extends Command
{
    protected $signature = 'make:superadmin {name} {email} {password} {location?}';
    protected $description = 'Créer un super-admin';

    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = bcrypt($this->argument('password'));
        $location = $this->argument('location') ?? 'unknown';

        // Créer l'utilisateur
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'location' => $location,
        ]);

        // Vérifier si le rôle super-admin existe, sinon le créer
        $role = Role::firstOrCreate(['name' => 'super-admin']);

        // Associer le rôle à l'utilisateur
        $user->roles()->attach($role->id);

        $this->info("Super-admin créé : {$user->name} ({$user->email}) à $location");
    }
}
