@extends('layouts.app')

@section('content')
    <h1>Αξιολόγηση Παραγωγής - {{$paragwgi->Τίτλος}}</h1>
    <form method="post" action="{{ route('Axiologisi.store', $paragwgi->ΘΠ_ID) }}">
        Βαθμολογία: <input name="vathmologia" type="number" step="0.1" min="0" max="10" value="10.0" required/><br/>
        Περιγραφή: <textarea name="perigrafi"></textarea><br/>
        <button type="submit">Καταχώρηση</button>
    </form>
@endsection

