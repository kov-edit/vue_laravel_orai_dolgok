@extends('layouts.app') <!-- layouts->app.blade.php yield része -->
@section('title', '| Teszt oldal') <!-- változó tartalma-->

@section('content') <!-- a content yield helyén ez fog megjelenni -->

    <div class="jumbotron">
        <h1>Hali</h1>
        <p class="lead">Első demo route 🥳</p>
        <a href="https://szbi-pg.hu" class="btn btn-lg btn-primary" role="button">Learn</a>
        <p>{{ date('Y-m-d H:i:s') }}</p>
        <p>{{ $randomName }}</p> <!-- tesztController.php-ból -->
    </div>

@endsection