<?php
namespace App\Http\Controllers;
use App\Models\Name;
use App\Models\Family;

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

    public function namesCreate($family, $name)
    {
        $nameRecord = new Name();
        $nameRecord->name = $name;  //a nyilakkal adjuk meg hogy mit akarunk
        $nameRecord->family_id = $family;
        $nameRecord->save();
        return $nameRecord->id;
    }

    public function familiesCreate($name)
    {
        $familyRecord = new Family();
        $familyRecord->surname = $name;
        $familyRecord->save();
        return $familyRecord->id;
    }

    /*$names = \DB::table('names')->
        ->where('name', '<>', 'Béla')
        ->whereAnd('id', '>', 1)
        ->orderBy('name','ASC')
        ->get();

    $names = \DB::select('
        SELECT * FROM names
        WHERE name <> "Béla"
        AND id > 1
        ORDER BY id desc
    ')*/
}