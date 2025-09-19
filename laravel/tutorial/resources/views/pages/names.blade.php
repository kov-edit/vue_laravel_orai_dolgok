@extends('layouts.app')
@section('title', '| Nevek')

@section('content')
    {{-- itt lesz a tartalom --}}
    <div class="container">
        <ul>
            @foreach ($names as $name)
                <li @if ($name == 'Adorján') style="font-weight: bold; color: blue; text-decoration: underline;" @endif>
                    @if ($loop->last) Utolsó: @endif {{-- loop: indexek, elemek kérhetőek vele --}}
                    {{ $name }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection