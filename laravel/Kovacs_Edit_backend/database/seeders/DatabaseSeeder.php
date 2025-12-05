<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategoria;
use App\Models\Ingatlan;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $kategoriak = ['Ház', 'Lakás', 'Építési telek', 'Garázs', 'Mezőgazdasági terület', 'Ipari ingatlan'];

        foreach ($kategoriak as $key => $value) {
            Kategoria::create([
                'nev' => $value,
            ]);
        }
    }
}
