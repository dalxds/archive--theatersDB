@extends('layouts.app')

@section('content')
<div class = "container">
    <h1> {{ $theatro->Όνομα }} </h1>
    <div class = "theater-info">
        <p><a href = "https://maps.google.com/?q={{ $theatro->Τοποθεσία }}" target="_blank">{{ $theatro->Τοποθεσία }}</a></p>
        <p><a href = "tel:{{ $theatro->Τηλέφωνο }}">{{ $theatro->Τηλέφωνο }}</a></p>
        <p><a href = "mailto:{{$theatro->Email}}">{{ $theatro->Email}}</a></p>
    </div>

    <h2>Παραστάσεις</h2>
    @empty($paragwges)
        <p>Δεν υπάρχουν Παραστάσεις</p>
    @else
    <!-- TODO Link για εισιτήριο -->
    <div class = "table-responsive">
        <table class="table table-hover">
            <thead>
                <th>Θεατρική Παραγωγή</th>
                <th>Αίθουσα</th>
                <th>Σεζόν</th>
                <th>Έναρξη</th>
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
    </div>
    @endempty
</div>

@endsection
