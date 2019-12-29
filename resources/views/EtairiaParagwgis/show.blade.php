<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $etairia->Όνομα }}</h1>

    <h2 style="display: inline;">Παραγωγές</h2> 
    <span class="create_icon"> 
    <a href="{{ route('TheatrikiParagwgi.create') }}">+</a>
     <!-- <i class="fas fa-plus"></i>  -->
   
    </span>
    @empty($paragwges)
        Δεν υπάρχουν Παραγωγές
    @else
        <div class = "row">
            @foreach($paragwges as $p)
                <div class = "col-sm-4">
                    <div class = "card card_style">
                        <a href = "{{ route('TheatrikiParagwgi.show', ['id' => $p->ΘΠ_ID]) }}">
                            <div class = "card-body"> {{ $p->Τίτλος }} </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endempty
    
</div>
@endsection
