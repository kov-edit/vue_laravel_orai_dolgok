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
                    <th>Vezetéknév</th>
                    <th>Keresztnév</th>
                    <th>Létrehozás</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach($names as $name)
                    <tr>
                        <td>{{ $name->id }}</td>

                        @empty($name->family)
                            <td><strong>Nincs adat</strong></td>
                        @else
                            <td>{{ $name->family->surname }}</td>
                        @endempty

                        <td>{{ $name->name }}</td>
                        <td>{{ $name->created_at }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-danger btn-delete-name" data-id="{{ $name->id }}">Törlés</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3 class="mt-3">Új nev hozzáadása</h3>
        <form action="/names/manage/name/new" method="POST">
            @csrf
            <div class="form-group">
                <label for="inputFamily">Vezetéknév</label>
                <select name="inputFamily" id="inputFamily" class="form-control">
                    @foreach($families as $family) {{-- familes táblából kap adatokat --}}
                        <option value="{{ $family->id }}">{{ $family->surname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="inputName">Keresztnév</label>
                <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Ide a keresztnevet">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Hozzáadás</button>
        </form>
    </div>
@endsection

@section('script')
    <script>


        $('.btn-delete-name').on('click', function () {
            let thisBtn = $(this);
            let id = thisBtn.data('id');
            $.ajax({
                type: "POST",
                url: "/names/delete",
                data: {
                    _token: '{{ csrf_token() }}',  //webes eszköz, bejelenkezett felhasználók nevében lehet valamit csinálni, minden oldaltöltéskor generál, véd a támadásoktól
                    id: id
                },
                success: function () {
                    thisBtn.closest('tr').fadeOut();
                },
                error: function () {
                    alert('Nem sikerült a törlés');
                }
            })
        })
    </script>
@endsection

<script>
    //jquery nélkül
    /*document.addEventListener('DOMContentLoaded', function () {
        let deleteButtons = document.querySelectorAll('.btn-delete-name');
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                let id = this.dataset.id;

                let formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
    formData.append('id', id);

    fetch('/names/delete', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            if (!response.ok) throw new Error('Nem sikerült a törlés');
        }
                return response)


        })
            .then(() => {
            let row = this.closest('tr');
            row.style.display = 'none';
        })
        .catch(error => {
            alert(error.message);
        })
    })
    })*/
</script>