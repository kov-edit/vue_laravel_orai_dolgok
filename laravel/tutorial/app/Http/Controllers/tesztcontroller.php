<?php
namespace App\Http\Controllers;
use App\Models\Name;

class TesztController
{
    public function teszt()
    {
        $name = ['Emerencia', 'Radiátor', 'Adorján', 'Dzsesszika', 'Kolos', 'Ágoston'];
        $randomNameKey = array_rand($name, 1);
        $randomName = $name[$randomNameKey];
        return view('pages.teszt', compact('randomName')); //compact = visszaadja az adatot, pages.teszt -hez kell visszaadnia
    }

    public function names()
    {
        /*$names = ['Emerencia', 'Radiátor', 'Adorján', 'Dzsesszika', 'Kolos', 'Ágoston'];
        return view('pages.names', compact('names'));*/

        $names = Name::all();

        return view('pages.names', compact('names'));
    }

    public function namesCreate($name)
    {
        $nameRecord = new Name();
        $nameRecord->name = $name;  //a nyilakkal adjuk meg hogy mit akarunk
        $nameRecord->save();
        return $nameRecord->id;
    }
}