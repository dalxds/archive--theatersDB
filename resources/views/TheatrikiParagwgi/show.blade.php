@extends('layouts.app')

@section('content')
<div class = "container">
    <h1>Θεατρική Παραγωγή "{{ $paragwgi->Τίτλος }}"</h1>

    <h2>Συντελεστές</h2>
    @empty($syntelestes)
        Δεν υπάρχουν Συντελεστές
    @else
        <table class="table table-striped">
            <thead>
                <td>Όνοματεπώνυμο</td>
                <td>Ιδιότητα</td>
            </thead>
            <tbody>
                @foreach($sintelestes as $s)
                    <tr>
                        <td>
                            <a href="{{ route('Sintelestis.show', ['id' => $s->Σ_ID]) }}">
                                {{ $s->Όνομα }} {{ $s->Επώνυμο }}
                            </a>
                        </td>
                        <td>{{ $s->Ιδιότητα }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endempty

    <h2>Παραστάσεις</h2>
    @empty($parastaseis)
        Δεν υπάρχουν Παραστάσεις
    @else
        <!-- fix table responsiveness -->
        <table class="table table-striped">
            <thead>
                <td>Θέατρο</td>
                <td>Αίθουσα</td>
                <td>Σεζόν</td>
                <td>Έναρξη</td>
            </thead>
            <tbody>
            @foreach($parastaseis as $p)
                <tr>
                    <td><a href="{{ route('Theatro.show', $p->Θ_ID) }}">{{ $p->Όνομα }}</a></td>
                    <td>{{ $p->Όνομα_Αίθουσας }}</td>
                    <td>{{ $p->Σεζόν }}</td>
                    <td>{{ $p->Έναρξη }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endempty

    @if($own)
        <br/>
        <a href="{{ route('Parastasi.create', $paragwgi->ΘΠ_ID) }}">Δημιουργία Παράστασης</a>
    @endif
</div>
@endsection
