<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['email' => 'devarsesther@gmail.com', 'name' => 'Esther',        'password' => '123456789'],
            ['email' => 'hello@miniblog.test',     'name' => 'Esther Admin', 'password' => '123456789'],
            ['email' => 'titi@mail.com',           'name' => 'Titi Editor',  'password' => 'titititi'],
            ['email' => 'tata@mail.com',           'name' => 'Tata Author',  'password' => 'tatatata'],
            ['email' => 'tutu@mail.com',           'name' => 'Tutu Viewer',  'password' => 'tutututu'],
            // compte démo (servira aussi pour Breeze en Partie 4)
            ['email' => 'demo@local.test',         'name' => 'Demo User',    'password' => 'secret123'],
        ];

        foreach ($users as $u) {
            User::updateOrCreate(
                ['email' => $u['email']], // clé unique
                [
                    'name'              => $u['name'],
                    'password'          => Hash::make($u['password']),
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}
