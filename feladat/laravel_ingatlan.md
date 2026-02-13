**composer create-project laravel/laravel kovacs\_edit\_backend**



.env adatbázis beállítások -> átírni a connection-t mysql-re, jelszó mysql



terminálban: **php artisan make:model kategoria -m**

**php artisan make:model ingatlan -mc --api**



átnevezés a migration fájlnévben és két helyen a fájlban



**kategoria migration**ben:

$table->id();

$table->string(('nev'));



**ingatlanok migration**ben:

&nbsp;           $table->id();

&nbsp;           $table->foreignId('kategoria')->references('id')->on('kategoriak');

&nbsp;           $table->string('leiras')->nullable();

&nbsp;           $table->timestamp('hirdetesDatuma')->nullable()->default(DB::raw('CURRENT\_TIMESTAMP'));

&nbsp;           $table->boolean('tehermentes');

&nbsp;           $table->integer('ar');

&nbsp;           $table->string('kepUrl')->nullable();



**kategoria** és **ingatlan model**lek:

&nbsp;   public $table = 'kategoriak'; vagy ugye ingatlanok

&nbsp;   public $timestamps = false;



**databaseseeder**-be:

use App\\Models\\kategoria

$kategoriak = \['Ház', 'Lakás', 'Építési telek', 'Garázs', 'Mezőgazdasági terület', 'Ipari ingatlan'];

&nbsp;       foreach ($kategoriak as $key => $value) {

&nbsp;           kategoria::create(\['nev' => $value]);

&nbsp;       }



ingatlanok táblába phpmyadminból csv importálás, 1. sortól (0 helyett 1)



terminal: **php artisan install:api** (no) -> létrehoz a controllerbe alap függvényeket

**composer remove laravel/sanctum** -> config mappában sanctum.php-t manuálisan törölni



**ingatlancontroller**-be:

&nbsp;   public function index()

&nbsp;   {

&nbsp;       $ingatlanok = ingatlan::all();

&nbsp;       return response()->json($ingatlanok);

&nbsp;   }



**api**-ba:

sanctumos törlése

Route::get('/ingatlan', \[IngatlanController::class, 'index']);



SZERVER FUTTATÁSA - HELYES ADATBÁZIS MEZŐK FIGYELÉSE



utána lekérdezés: http://localhost:8000/api/ingatlan



###### ***minden lekérdezés, kategoriánál helyes megjelenítés:***

**ingatlan.php**:

&nbsp;   public function kategoria()

&nbsp;   {

&nbsp;       return $this->belongsTo(kategoria::class, 'kategoria');

&nbsp;   }



**ingatlancontroller**:

public function index()

&nbsp;   {

&nbsp;       $ingatlanok = ingatlan::with('kategoria')->get();

&nbsp;       return response()->json($ingatlanok);

&nbsp;   }



###### ***új ingatlan felvitele:***

**ingatlancontroller**:

use Illuminate\\Support\\Facades\\Validator;



&nbsp;   public function store(Request $request)

&nbsp;   {

&nbsp;       $validator = Validator::make($request->all(), \[

&nbsp;           'kategoria' => 'required',

&nbsp;           'tehermentes' => 'required',

&nbsp;           'ar' => 'required',

&nbsp;       ]);



&nbsp;       if ($validator->fails()) {

&nbsp;           return response()->json(\['message' => 'Hiányos adatok'], 400);

&nbsp;       }



&nbsp;       return ingatlan::create($request->all());



//aztán hogy az id-t adja vissza:

$ingatlan = ingatlan::create($request->all());

&nbsp;       return response()->json(\['id' => $ingatlan->id], 201);

&nbsp;   }



**ingatlan.php**:

public $guarded = \[];



**api.php**:

Route::post('/ingatlan', \[IngatlanController::class, 'store']);



###### ***ingatlan törlése:***

**ingatlancontroller**:

show és update törlése (nem kell)

&nbsp;   public function destroy($id)

&nbsp;   {

&nbsp;       $ingatlan = ingatlan::where('id', '=', $id);

&nbsp;       if ($ingatlan->exists()) {

&nbsp;           $ingatlan->delete();

&nbsp;           return (response('', 204));

&nbsp;       }

&nbsp;       return response('Ingatlan nem létezik', 404);

&nbsp;   }



**api.php**:

Route::delete('/ingatlan/{id}', \[IngatlanController::class, 'destroy']);

