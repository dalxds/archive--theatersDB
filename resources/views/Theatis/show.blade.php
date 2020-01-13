@extends('layouts.app')

@section('content')
    <h1>Προφίλ Θεατή - {{ $theatis->Όνομα }} {{ $theatis->Επώνυμο }}</h1>

    <h2>Αξιολογήσεις Παραστάσεων</h2>
    @include('Theatis.axiologiseis', compact('axiologiseis'))
@endsection
