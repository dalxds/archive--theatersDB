@extends('layouts.app')

@section('content')
<section class="has-divider bg-primary-2 text-light">
        <div class="container">
            <div class="row">
            <div class="col">
                <h1>Παίζονται / Προσεχώς</h1>
            </div>
            </div>
        </div>
        <div class="divider" style="">
            <svg width="100%" height="96px" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" class="injected-svg bg-white">
                <polygon fill="#ffffff" points="100 0 100 100 0 100"></polygon>
            </svg>
      </div>
</section>

<div class="container">
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
