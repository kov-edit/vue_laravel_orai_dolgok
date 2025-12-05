###### **Setup:**



Szoki env adatok

Terminál:
*php artisan make:model kategoria -m*  {{ ez modelt is csinál }}

*php artisan make:model ingatlan -mc --api*   {{ modelt, controllert, és a controllerbe api összekötést is ír }}



Migration-ben átírtuk a többesszámot a fájlban (hogy kategorias helyett kategoriak)



ingatlaok table:

$table->foreignId('kategoria')->references('id')->on('kategoriak');  {{ idegen kulcs (milyen oszlop legyen)->milyen oszlopból->milyen táblából

Meg a többi sor is nyilván



###### **Modellek:**



kategoria.php:

&nbsp;   public $table = 'kategoriak';

&nbsp;   public $timestamps = false;



ingatlanba is ezek



Közbe seeder a DatabaseSeeder-be: 
	$kategoriak = \['Ház', 'Lakás', 'Építési telek', 'Garázs', 'Mezőgazdasági terület', 'Ipari ingatlan'];



&nbsp;       foreach ($kategoriak as $key => $value) {

&nbsp;           Kategoria::create(\[

&nbsp;               'nev' => $value,

&nbsp;           ]);

&nbsp;       }

ezután migrate --seed-el lefut szépen



terminálba: *php artisan install:api* {{ api-t hoz létre }}

*composer remove laravel/sanctum*  {{ tötölrjük mert lassít de errort ad és a config/sanctum.php-t törölni kell }}



###### **Route:**



api.php: Route::get('/ingatlan', \[IngatlanController::class, 'index']);  {{sanctumos részt törölni }}





Thunder cloud agenttel GET-el send-eltük miután php artisan serve-eltünk



ingatlan.php-ba:

public function kategoria()

&nbsp;   {

&nbsp;       return $this->belongsTo(Kategoria::class, 'kategoria');

&nbsp;   }

ingatlancontrollerbe változás: $ingatlanok = Ingatlan::with('kategoria')->get();



###### **POST:**

ingatlanControlelrbe a store functionbe:

$validator = Validator::make($request->all(), \[

&nbsp;           'kategoria' => 'required',

&nbsp;           'tehermentes' => 'required',

&nbsp;           'ar' => 'required',

&nbsp;       ]);



&nbsp;       if ($validator->fails()) {

&nbsp;           return response()->json(\['message' => 'Hiányos adatok'], 400);

&nbsp;       }



&nbsp;       return Ingatlan::create($request->all());



ingatlan.php-ba: fillable VAGY guarded

public $guarded = \[];



api.php-ba: Route::post('/ingatlan', \[IngatlanController::class, 'store']);





ha csak id-t akarok: ingatlancontrollerbe: $ingatlan = Ingatlan::create($request->all());

&nbsp;       return response()->json(\['id' => $ingatlan->id], 201);



