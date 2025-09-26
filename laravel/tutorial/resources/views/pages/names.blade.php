@extends('layouts.app')
@section('title', '| Nevek')

@section('content')
    {{-- itt lesz a tartalom --}}
    <div class="container">
        <!--<ul>
                        @foreach ($names as $name)
                            <li @if ($name == 'Adorján') style="font-weight: bold; color: blue; text-decoration: underline;" @endif>
                                @if ($loop->last) Utolsó: @endif {{-- loop: indexek, elemek kérhetőek vele --}}
                                {{ $name }}
                            </li>
                        @endforeach
                    </ul> -->

        <table class="table table-striped table-hover"> {{-- boostrap táblázathoz tartozó osztályai --}}
            <thead>
                <tr>
                    <th>Azonosító</th>
                    <th>Név</th>
                    <th>Létrehozás</th>
                </tr>
            </thead>
            <tbody>
                @foreach($names as $name)
                    <tr>
                        <td>{{ $name->id }}</td>
                        <td>{{ $name->name }}</td>
                        <td>{{ $name->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection