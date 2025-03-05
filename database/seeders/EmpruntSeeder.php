<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Emprunt;

class EmpruntSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Emprunt::create(['livre_id' => 1, 'date_emprunt' => now(), 'date_retour' => null]);
    }
}
