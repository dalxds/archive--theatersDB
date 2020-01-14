@extends('layouts.app')

@section('content')
<section class="has-divider bg-primary-2 text-light">
    <div class="container">
        <div class="row">
        <div class="col">
            <h1> {{ $theatro->Όνομα }} </h1>
        </div>
        </div>
    </div>
    <div class="divider">
        <svg width="100%" height="96px" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" class="injected-svg bg-white">
            <path d="M0,0 C40,33 66,52 75,52 C83,52 92,33 100,0 L100,100 L0,100 L0,0 Z"></path>
        </svg>
    </div>
</section>

<div class = "container">
    <h2>Πληροφορίες</h2>
    <div class = "theater-info">
        <p><a href = "https://maps.google.com/?q={{ $theatro->Τοποθεσία }}" target="_blank">{{ $theatro->Τοποθεσία }}</a></p>
        <p><a href = "tel:{{ $theatro->Τηλέφωνο }}">{{ $theatro->Τηλέφωνο }}</a></p>
        <p><a href = "mailto:{{$theatro->Email}}">{{ $theatro->Email}}</a></p>
    </div>

    <h2>Παραστάσεις</h2>
    @empty($parastaseis)
        <p>Δεν υπάρχουν Παραστάσεις</p>
    @else
    <div class = "table-responsive">
        <table class="table table-hover">
            <thead>
                <th>Θεατρική Παραγωγή</th>
                <th>Αίθουσα</th>
                <th>Σεζόν</th>
                <th>Έναρξη</th>
                @auth
                    <th>Εισητήρια</th>
                @endauth
            </thead>
            <tbody>
            @foreach($parastaseis as $p)
                <tr>
                    <td><a href="{{ route('TheatrikiParagwgi.show', $p->ΘΠ_ID) }}">{{ $p->Τίτλος_Παραγωγής }}</a></td>
                    <td>{{ $p->Όνομα_Αίθουσας }}</td>
                    <td>{{ $p->Σεζόν }}</td>
                    <td>{{ date('d-m-Y H:i' , strtotime($p->Έναρξη)) }}</td>
                    @auth
                        <td><a href="{{ route('Parastasi.show', $p->Π_ID) }}">Εισητήρια</a></td>
                    @endauth
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endempty
</div>

@endsection
