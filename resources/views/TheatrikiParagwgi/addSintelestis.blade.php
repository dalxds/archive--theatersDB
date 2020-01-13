@extends('layouts.app')

@section('content')
    <h1>Προσθήκη Συντελεστή - {{ $paragwgi->Τίτλος }}</h1>

    <form action="{{route('TheatrikiParagwgi.addSintelestis', $paragwgi->ΘΠ_ID)}}" method="post">
        Συντελεστής: <select name="sintelestis_id">
            @foreach($all_sintelestes as $s)
                <option value="{{ $s->Σ_ID }}">{{ $s->Όνομα }} {{ $s->Επώνυμο }}</option>
            @endforeach
        </select>
        <br/>
        Ιδιότητα: <input name="idiotita" placeholder="Πχ. Ηθοποιός" required>
        <br/>
        <button type="submit">Προσθήκη</button>
    </form>
@endsection
