@extends('layouts.app')

@section('content')
    <h1>Συντελεστής "{{ $sintelestis->Όνομα }} {{ $sintelestis->Επώνυμο }}"</h1>

    <h2>Θεατρικές Παραγωγές</h2>
    <table class="table table-striped">
        <thead>
            <td>Τίτλος</td>
            <td>Ιδιότητα</td>
        </thead>
        <tbody>
        @foreach($paragwges as $p)
            <tr>
                <td>
                    <a href="{{ route('TheatrikiParagwgi.show', ['id' => $p->ΘΠ_ID]) }}">
                        {{ $p->Τίτλος }}
                    </a>
                </td>
                <td>{{ $p->Ιδιότητα }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
