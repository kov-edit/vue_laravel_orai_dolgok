@extends('layouts.app')
@section('title', '| Profil')

@section('content')
    <div class="row">
        <div class="col-12 col-md-6">
            <h3>Adatok</h3>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ Auth::user()->name }}</h2>
                    <p class="card-text">profilja</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">E-mail: {{ Auth::user()->email }}</li>
                    <li class="list-group-item">Regisztráció: {{ Auth::user()->created_at }}</li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <h3>Jelszócsere</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/profil/change-password" method="post">
                @csrf
                <div class="form-group">
                    <label for="password">Jelszó</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Jelszó megerősítése</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    <!-- password_confirmation = validációs szabály -->
                </div>

                <button type="submit" class="btn btn-primary">Jelszócsere</button>
            </form>
        </div>
    </div>
@endsection