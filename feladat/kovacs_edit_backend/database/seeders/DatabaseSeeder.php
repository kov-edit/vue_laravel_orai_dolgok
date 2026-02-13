<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\kategoria;

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
            kategoria::create(['nev' => $value]);
        }
    }
}
