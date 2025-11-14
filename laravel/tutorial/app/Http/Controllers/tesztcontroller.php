<?php
namespace App\Http\Controllers;
use App\Models\Name;
use App\Models\Family;
use GuzzleHttp\Psr7\Query;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Exception;

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
        $families = Family::all();

        return view('pages.names', compact('names', 'families'));
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

    public function namesDelete(Request $request)
    {
        $name = Name::find($request->input('id'));
        $name->delete();
        return "ok";
    }

    public function manageSurname()
    {
        $names = Family::all();
        return view('pages.surname', compact('names'));
    }

    public function deleteSurname(Request $request)
    {
        try {
            $family = Family::find($request->input('id'));
            $family->delete();
            return response()->json(['success' => true]);
        } catch (QueryException $e) {
            return response()->json(['success' => false, 'message' => 'A családnév nem törölhető, mert vannak hozzákapcsolódó nevek']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Ismeretlen hiba']);
        }

    }

    public function newSurname(Request $request)
    {
        $validateData = $request->validate([
            'inputFamily' => 'required|alpha|min:2|max:20', //kötelező, abc betűi, min 2 karakter, max 20

        ]);
        $family = new Family();
        $family->surname = $request->input('inputFamily');
        $family->save();
        return redirect('/names/manage/surname');
    }

    public function newName(Request $request)
    {
        $validateData = $request->validate([
            'inputFamily' => 'required|integer|exists:App\Models\Family,id', //exists: egy tábla mezőit kapja, hogy van e
            'inputName' => 'required|alpha|min:2|max:20',
        ]);
        $name = new Name();
        $name->family_id = $request->input('inputFamily');
        $name->name = $request->input('inputName');
        $name->save();
        return redirect('/names');
    }

    /* Hasznos funkciók
    function saveData(Request $request)   //hivatkozunk a kapott kérésekre - Response-al választ is tudunk adni
    {

    }

    function returnObject()
    {
        $obj = new \stdClass();
        $obj->name = 'Neve';
        $obj->server = 'SZBI-PG';
        return response()->json($obj);
    }

    function returnError()
    {
        return response()
            ->view('error', ['valtozo' => 'válttozó értéke'], 404); //404-es hibakódot adja vissza
    }

    function redirectAway()
    {
        return redirect()->away('https://google.com');  //átirányít másik oldalra
    }*/

    /* Lekérés példák
    $names = \DB::table('names')->
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