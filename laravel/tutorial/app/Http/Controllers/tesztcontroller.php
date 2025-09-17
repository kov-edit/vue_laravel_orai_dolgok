<?php
namespace App\Http\Controllers;

class TesztController {
    public function teszt() {
        $name = ['Emerencia', 'Radiátor', 'Dzsesszika', 'Kolos'];
        $randomNameKey = array_rand($name, 1);
        $randomName = $name[$randomNameKey];
        return view('teszt', compact('randomName')); //compact = visszaadja az adatot
    }
}