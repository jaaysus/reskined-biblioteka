<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Auteur;

class AuteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Auteur::create(['nom' => 'Hugo', 'prenom' => 'Victor']);
        Auteur::create(['nom' => 'Camus', 'prenom' => 'Albert']);
    }
}
