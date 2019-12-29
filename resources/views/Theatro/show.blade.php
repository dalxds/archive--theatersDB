@extends('layouts.app')

@section('content')
    <h1>Θέατρο - {{ $theatro->Όνομα }}</h1>

    <

    <h2>Παραστάσεις</h2>
    <table class="table table-striped">
        <thead>
        <td>Θεατρική Παραγωγή</td>
        <td>Αίθουσα</td>
        <td>Σεζόν</td>
        <td>Έναρξη</td>
        </thead>
        <tbody>
        @foreach($parastaseis as $p)
            <tr>
                <td><a href="{{ route('TheatrikiParagwgi.show', $p->ΘΠ_ID) }}">{{ $p->Τίτλος_Παραγωγής }}</a></td>
                <td>{{ $p->Όνομα_Αίθουσας }}</td>
                <td>{{ $p->Σεζόν }}</td>
                <td>{{ $p->Έναρξη }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
