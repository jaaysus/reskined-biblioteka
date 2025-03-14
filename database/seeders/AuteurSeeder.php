<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Auteur;

class AuteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Auteur::create(['nom' => 'Yoo', 'prenom' => 'Seong Gyeong']);
        Auteur::create(['nom' => 'Lee', 'prenom' => 'Jung Ho']);
        Auteur::create(['nom' => 'Jin', 'prenom' => 'Kang Hoon']);
    }
}
