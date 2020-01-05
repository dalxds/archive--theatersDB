@extends('layouts.app')

@section('content')
<div class = "container">
    <h1> {{ $paragwgi->Τίτλος }} </h1>

    <h2>Συντελεστές</h2>
    @empty($syntelestes)
        <p>Δεν υπάρχουν Συντελεστές</p>
    @else
    <div class = "table-responsive"> 
        <table class="table table-hover">
            <thead>
                <th>Όνοματεπώνυμο</td>
                <th>Ιδιότητα</td>
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
    </div>
    @endempty

    <h2>Παραστάσεις</h2>
    <span><i class="fas fa-plus"></i></span>
    @empty($parastaseis)
        <p>Δεν υπάρχουν Παραστάσεις</p>
    @else
        <div class = "table-responsive">
            <table class="table table-hover">
                <thead>
                    <th scope = "col">Θέατρο</th>
                    <th scope = "col">Αίθουσα</th>
                    <th scope = "col">Σεζόν</th>
                    <th scope = "col">Έναρξη</th>
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
        </div>
    @endempty  

    @if($own)
        <br/>
        <a href="{{ route('Parastasi.create', $paragwgi->ΘΠ_ID) }}">Δημιουργία Παράστασης</a>
    @endif
</div>
@endsection
