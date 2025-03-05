<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Livre;

class LivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Livre::create(['titre' => 'Les Misérables', 'annee_publication' => 1862, 'nombre_pages' => 1463, 'auteur_id' => 1]);
        Livre::create(['titre' => 'L’Étranger', 'annee_publication' => 1942, 'nombre_pages' => 123, 'auteur_id' => 2]);
    }
}
