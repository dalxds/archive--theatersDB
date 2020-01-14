@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Παίζονται / Προσεχώς</h1>

    <div class = "row">
        @foreach($prosexws as $p)
        <div class = "col-sm-4 d-flex align-items-stretch">
            <a href = "{{ route('TheatrikiParagwgi.show', $p->ΘΠ_ID) }}" class = "card card-body card_style justify-content-between bg-primary text-light">
                <h3> {{ $p->Τίτλος_Παραγωγής }} </h3>
                <span class = "text-small opacity-70">{{ $p->Θέατρο }}</span>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
