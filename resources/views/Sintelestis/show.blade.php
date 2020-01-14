@extends('layouts.app')

@section('content')
<section class="has-divider bg-primary-2 text-light">
    <div class="container">
        <div class="row">
        <div class="col">
            <h1>{{ $sintelestis->Όνομα }} {{ $sintelestis->Επώνυμο }}</h1>
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
    <h2>Βιογραφικό</h2>
    <p>{{ $sintelestis-> Βιογραφικό }}</p>
    <h2>Παραστάσεις</h2>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <th>Τίτλος</th>
                <th>Ιδιότητα</th>
            </thead>
            <tbody>
            @foreach($paragwges as $p)
                <tr>
                    <td>
                        <a href="{{ route('TheatrikiParagwgi.show', ['id' => $p->ΘΠ_ID]) }}">
                            {{ $p->Τίτλος }}
                        </a>
                    </td>
                    <td>{{ $p->Ιδιότητα }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
