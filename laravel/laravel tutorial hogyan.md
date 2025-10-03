Teszt projekt:



resources/views - új fájl: teszt.blade.php

html (!-el), bootstrap



routes/web.php - Route::get('/teszt', function () {

&nbsp;   return view('teszt');

});



url-be a port név után /teszt



##### **Kontroller**



app/http/controllers - új fájl: tesztcontroller.php  (függvényeket írunk a views-hoz)



routes/web.php - a fenti helyett: Route::get('/teszt', \[TesztController::class, 'teszt']); | felülre pedig: use App\\Http\\Controllers\\tesztcontroller;

&nbsp;	a class neve nálam TesztController és a fájl neve tesztcontroller



resources/views - 3 új mappa: includes, layouts, pages

includes - új fájlok: head.blade.php (hmtl nyitótag - body nyitótag), nav.blade.php (nav), foot.blade.php (script és zárótagek)

layouts - új fájl: app.blade.php (@includes)



web.php - kiegíszítés az új names.blade.php-val





php artisan után ami megnyílik oldal az alap nyitó, fentre /teszt és belemegy a mappába



*php artisan make:migration create\_names\_table* -> új tábla létrehozása (database/migrations-be létrejön aznapi dátummal)

&nbsp;	a fájlon belül lehet módosítani, hogy régebbi verziókat is visza tudjunk állítani

&nbsp;	

&nbsp;	$table->string('mezonev', 100)->nullable()  //új mező ami 0 értéket is felvehet, 100 karakter hosszú lehet

&nbsp;	$table->string('mezonev')->default('alapérték')  //alap érték felvétele



&nbsp;	változtatás után php artisan migrate



##### **ÚJ név felvétele oldalról**



models mappa - új fájl: Name.php

web.php-ba új route: Route::get('/names/create/{name}', \[TesztController::class, 'namesCreate']);  //változót is tudunk benne használni



fentre /names/create/Béla - fel lehet venni nevet



tesztController.php - use App\\Models\\Name;   //ez után tudjuk használi a függvényt, mert importálja

&nbsp;	függvény megírása után fentre csak /names, és kihozza a tábla rekordjait



&nbsp;	$names = Name::find(i); //i. elemet adja vissza



&nbsp;	$names = Name::where('name', 'Kolos')->first();  //megadom hogy mit keresek, és az elsőt adja vissza (elhagyható), get-el az összes elemet adja vissza tömbben



&nbsp;	$names = Name::where('id', '>', 2)->get();  //2-nél nagyobb id-ú elem tömbjét adja vissza



&nbsp;	$names = Name::where('name', '<>', 'Béla')  //nem egyenlő

&nbsp;           ->whereAnd('id', '>', 1)  //id nagyobb mint 1

&nbsp;           ->orderBy('id', 'desc')  //csökkenő sorrend

&nbsp;           - get();  //tömbben adja vissza



names.blade.php-ban módosítottuk hogy szépen nézzen ki



##### **Új tábla (family) létrehozása:**

*php artisan make:migration create\_families\_table*



a saját migrációs mappájában tudjuk szerkeszteni



*php artisan make:migration add\_family\_id\_to\_names\_table*



itt is a saját migrációját módosítjuk az up függvényben:

$table->unsignedBigInteger('family\_id')->nullable();

$table->foreign('family\_id')->references('id')->on('families');



Family.php létrehozása, egy class van benne

Name.php-ban egy függvénnyel visszaadjuk a family táblát



web.php-ban a nameCreates-es route módosítása, és új route: Route::get('/families/create/{name}', \[TesztController::class, 'familiesCreate']);

tesztController-be is importálni a familyt, és felvesszük az id-ját: $nameRecord->family\_id = $family;

majd új kontroller a famyily táblának is



/families/create/Vezetéknév -el tudunk hozzáadni felül

/names/create/1/Név - az első id a familiesből hozzáadódik az új keresztnévhez



names.blade.php-ban: @empty feltételt írtunk



