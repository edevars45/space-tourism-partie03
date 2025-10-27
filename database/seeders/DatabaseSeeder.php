<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * ─────────────────────────────────────────────────────────────────
         * PARTIE 01 (exemples) :
         * - Tu pouvais utiliser les factories Laravel pour générer 1+ users
         *   à titre de test rapide (code laissé en exemple ci-dessous).
         *   -> Non requis pour la Partie 03.
         * ─────────────────────────────────────────────────────────────────
         */

        // \App\Models\User::factory()->create([
        //     'name'  => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /**
         * ─────────────────────────────────────────────────────────────────
         * PARTIE 02 (exemples) :
         * - Si tu avais d'autres seeders (ex: contenus statiques), tu
         *   pouvais les appeler ici. Rien d'obligatoire pour le TP 03.
         *   -> Exemple :
         *   // $this->call(StaticContentSeeder::class);
         * ─────────────────────────────────────────────────────────────────
         */

        /**
         * ─────────────────────────────────────────────────────────────────
         * PARTIE 03 (ce que tu fais maintenant) :
         * - On peuple la table users avec une liste d'utilisateurs fixes
         *   pour la démo (dont un compte "demo@local.test").
         * - Le code réel est dans UsersSeeder.
         * ─────────────────────────────────────────────────────────────────
         */
        $this->call(UsersSeeder::class);
    }
}