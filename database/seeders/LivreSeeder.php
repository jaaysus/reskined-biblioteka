<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livre;

class LivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Livre::create(['titre' => 'Tower of God', 'annee_publication' => 2010, 'nombre_pages' => 400, 'auteur_id' => 1]);
        Livre::create(['titre' => 'The God of High School', 'annee_publication' => 2011, 'nombre_pages' => 350, 'auteur_id' => 2]);
        Livre::create(['titre' => 'Noblesse', 'annee_publication' => 2007, 'nombre_pages' => 500, 'auteur_id' => 3]);
    }
}
