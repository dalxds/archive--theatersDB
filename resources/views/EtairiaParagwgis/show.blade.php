<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')
<section class="has-divider bg-primary-2 text-light">
        <div class="container">
            <div class="row">
            <div class="col">
                <h1>{{ $etairia->Όνομα }}</h1>
            </div>
            </div>
        </div>
        <div class="divider">
            <svg width="100%" height="96px" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" class="injected-svg bg-white">
                <path d="M0,0 C40,33 66,52 75,52 C83,52 92,33 100,0 L100,100 L0,100 L0,0 Z"></path>
            </svg>
        </div>
</section>

<div class="container">
    @empty($paragwges)
        <p>Δεν υπάρχουν Παραγωγές</p>
    @else
        <div class = "row">
            @foreach($paragwges as $p)
            <div class = "col-sm-4 d-flex align-items-stretch">
                <a href ="{{ route('TheatrikiParagwgi.show', ['id' => $p->ΘΠ_ID]) }}" class = "card card-body card_style justify-content-between bg-primary text-light">
                    <h3> {{ $p->Τίτλος }} </h3>
                </a>
            </div>
            @endforeach
            <div class = "col-sm-4 d-flex align-items-stretch">
                <a href ="{{ route('TheatrikiParagwgi.create') }}" class = "card card-body card_style justify-content-between bg-primary text-light">
                    <h3><center> + </center></h3>
                </a>
            </div>
        </div>
    @endempty
    
</div>
@endsection
