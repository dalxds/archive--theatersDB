@extends('layouts.app')

@section('content')
<div class = "container">
    <h1> {{ $paragwgi->Τίτλος }} </h1>

    <h2>Συντελεστές</h2>
    @empty($sintelestes)
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
                            @if($own)
                                <form action="{{route('TheatrikiParagwgi.removeSintelestis', ['id' => $paragwgi->ΘΠ_ID, 'sintelestis_id' => $s->Σ_ID])}}" method="post">
                                    <input type="hidden" name="idiotita" value="{{ $s->Ιδιότητα }}">
                                    <button type="submit">Αφαίρεση</button>
                                </form>
                            @endif
                        </td>
                        <td>{{ $s->Ιδιότητα }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endempty

    @if($own)
        <a href="{{ route('TheatrikiParagwgi.addSintelestisForm', $paragwgi->ΘΠ_ID) }}">Προσθήκη Συντελεστή</a>
    @endif

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
                    @auth
                        <th>Εισητήρια</th>
                    @endauth
                </thead>
                <tbody>
                @foreach($parastaseis as $p)
                    <tr>
                        <td><a href="{{ route('Theatro.show', $p->Θ_ID) }}">{{ $p->Όνομα }}</a></td>
                        <td>{{ $p->Όνομα_Αίθουσας }}</td>
                        <td>{{ $p->Σεζόν }}</td>
                        <td>{{ $p->Έναρξη }}</td>
                        @auth
                            <td><a href="{{ route('Parastasi.show', $p->Π_ID) }}">Εισητήρια</a></td>
                        @endauth
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

    @include('TheatrikiParagwgi.axiologiseis', compact('axiologiseis'))

    @guest
        Κάνε log in για να αξιολογήσεις την Παραγωγή
    @else
        @if(!$own_axiologisi)
            <a href="{{ route('Axiologisi.create', $paragwgi->ΘΠ_ID) }}">Νέα Αξιολόγηση</a>
        @endif
    @endguest
</div>
@endsection
