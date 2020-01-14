<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $etairia->Όνομα }}</h1>

    @empty($paragwges)
        <p>Δεν υπάρχουν Παραγωγές</p>
    @else
        <div class = "row">
            @foreach($paragwges as $p)
            <div class = "col-sm-4">
                <a href ="{{ route('TheatrikiParagwgi.show', ['id' => $p->ΘΠ_ID]) }}" class = "card card-body card_style justify-content-between bg-primary text-light">
                    <h3> {{ $p->Τίτλος }} </h3>
                </a>
            </div>
            @endforeach
            <!-- TODO change color for + -->
            <div class = "col-sm-4">
                <a href ="{{ route('TheatrikiParagwgi.create') }}" class = "card card-body card_style justify-content-between bg-primary text-light">
                    <h3><center> + </center></h3>
                </a>
            </div>
        </div>
    @endempty
    
</div>
@endsection
