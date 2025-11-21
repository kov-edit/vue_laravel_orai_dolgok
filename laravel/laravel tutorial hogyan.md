Teszt projekt:



resources/views - új fájl: teszt.blade.php

html (!-el), bootstrap



routes/web.php - Route::get('/teszt', function () {

    return view('teszt');

});



url-be a port név után /teszt



##### **Kontroller**



app/http/controllers - új fájl: tesztcontroller.php  (függvényeket írunk a views-hoz)



routes/web.php - a fenti helyett: Route::get('/teszt', \[TesztController::class, 'teszt']); | felülre pedig: use App\\Http\\Controllers\\tesztcontroller;

 	a class neve nálam TesztController és a fájl neve tesztcontroller



resources/views - 3 új mappa: includes, layouts, pages

includes - új fájlok: head.blade.php (hmtl nyitótag - body nyitótag), nav.blade.php (nav), foot.blade.php (script és zárótagek)

layouts - új fájl: app.blade.php (@includes)



web.php - kiegíszítés az új names.blade.php-val





php artisan után ami megnyílik oldal az alap nyitó, fentre /teszt és belemegy a mappába



*php artisan make:migration create\_names\_table* -> új tábla létrehozása (database/migrations-be létrejön aznapi dátummal)

 	a fájlon belül lehet módosítani, hogy régebbi verziókat is visza tudjunk állítani

 

 	$table->string('mezonev', 100)->nullable()  //új mező ami 0 értéket is felvehet, 100 karakter hosszú lehet

 	$table->string('mezonev')->default('alapérték')  //alap érték felvétele



 	változtatás után php artisan migrate



##### **Új név felvétele oldalról**



models mappa - új fájl: Name.php

web.php-ba új route: Route::get('/names/create/{name}', \[TesztController::class, 'namesCreate']);  //változót is tudunk benne használni



fentre /names/create/Béla - fel lehet venni nevet



tesztController.php - use App\\Models\\Name;   //ez után tudjuk használi a függvényt, mert importálja

 	függvény megírása után fentre csak /names, és kihozza a tábla rekordjait



 	$names = Name::find(i); //i. elemet adja vissza



 	$names = Name::where('name', 'Kolos')->first();  //megadom hogy mit keresek, és az elsőt adja vissza (elhagyható), get-el az összes elemet adja vissza tömbben



 	$names = Name::where('id', '>', 2)->get();  //2-nél nagyobb id-ú elem tömbjét adja vissza



 	$names = Name::where('name', '<>', 'Béla')  //nem egyenlő

            ->whereAnd('id', '>', 1)  //id nagyobb mint 1

            ->orderBy('id', 'desc')  //csökkenő sorrend

            - get();  //tömbben adja vissza



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



##### **Új név felvétele jobb módszerrel és törlése**

foot.blade.php-ba egy jquery link és egy yield ami scriptre mutat

names.blade.php-ba új td törlés gomb ÉS új section-ba script, ami a foot.blade yield-je

tesztController.php-ba új function hogy töröljön is

web.php-ba új route: Route::post('/names/delete', \[TesztController::class, 'namesDelete']);



##### **Családnév táblázat**

nav.blade.php-ban új menüpont -> utána surname.blade.php létrehozása - names.blade nagy részét átvisszük, párat módosítunk

web.php-ban két új route: Route::get('/names/manage/surname', \[TesztController::class, 'manageSurname']);

Route::post('/names/manage/surname/delete', \[TesztController::class, 'deleteSurname']);

tesztController.php-ban új függvények: manageSurname és deletSurname



##### **Űrlap minden adathoz**

Családnév felvétele: surname.blade.php-ban új form a táblázat alá: <form action="/names/manage/surname/new" method="POST">

web.php új route: Route::post('/names/manage/surname/new', \[TesztController::class, 'newSurname']);

teszController-be új function: newSurname



Keresztnvé felvétele: names.blade.php-ba is űrlap: <form action="/names/manage/name/new" method="POST">

A form-group-ba a vezetéknév legördülő lista, foreach-el az adatbázisból - ehhez a tesztController-ben a names függvényhez új sor: $families = Family::all(); , és a compact-hoz is 'name' után vesszővel 'families'

web.php új route: Route::post('/names/manage/name/new', \[TesztController::class, 'newName']);

tesztController-be új függvény: newName



##### **Nevek validációja**

tesztController.php newSurname funkció kiegészítése:

$validateData = $request->validate(\[

            'inputFamily' => 'required|alpha|min:2|max:20',



        ]);



surname.blade.php-ban hibaüzenet megjelnítése (egy if-es error message)

Hogy ne tűntesse el a form>input-ba: value="{{ old('inputFamily') }}"

Validáció az input-ba közvetlen: minlength="2" maxlength="20" required



tesztController newName-be:

$validateData = $request->validate(\[

            'inputFamily' => 'required|integer|exists:App\\Models\\Family,id',

            'inputName' => 'required|alpha|min:2|max:20',

        ]);



###### **Hibaüzenet küldése:**

tesztController deleteSurname-be:
try {

            $family = Family::find($request->input('id'));

            $family->delete();

            return response()->json(\['success' => true]);

        } catch (Exception $e) {

            return response()->json(\['success' => false, 'message' => $e->getMessage()]);

        }



surname.blade script-be a success-hez:

if (data.success == true) {

                        thisBtn.closest('tr').fadeOut();

                    } else {

                        alert('Nem sikerült a törlés\\nRészletek: ' + data.message);

                    }



##### **Autentikáció**

Terminálba: 
composer require laravel/ui

php artisan ui vue --auth

-> szerver indítása, felül login/register gombok

Regisztráció után a users táblába felvette az adatot



nav.blade.php-ba, hogy autentikáljuk és ne dobja ki a bejelenetkezett felhasználót:

@auth

&nbsp;               <li class="nav-item">

&nbsp;                   <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Kijelentkezés</a>>

&nbsp;		    <form action="/logout" id="form-logout" method="post">@csrf</form>

&nbsp;               </li>

+Két nav-item bejelentkezéshez és regisztrációhoz, végén @endauth



names.blade.php-ban amihez nem fér hozzá @auth és @endauth közé tesszük



web.php-ban amit nem akarunk hogy bárki elérjen hozzárakunk egy ->middleware('auth')



Új oldal: profil.blade.php

web.php-ban új route, functionnal: Route::get('/profil', function () {return view('pages.profil');})->middleware('auth');

nav.blade.php-ban a 'Profil' menü a nav-ban @auth-os



##### **Jelszócsere**

profil.blade.php-ba beleírtuk a form-ot

Új fájl: UserController.php

web.php-ban ezt is felvenni route-nak, és felülre is hozzáadni

