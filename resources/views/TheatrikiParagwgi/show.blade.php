@extends('layouts.app')

@section('content')
<div class = "container py-4">
    <h1> {{ $paragwgi->Τίτλος }} </h1>

    <!-- TODO make button available only if own -->
    <div class="row">
        <div class="col-sm-6">
            <h2>Συντελεστές</h2>
        </div>
        @if($own)
            <div class="col-sm-6">
                <a href="{{ route('TheatrikiParagwgi.addSintelestisForm', $paragwgi->ΘΠ_ID) }}" class="m-1 btn btn-primary float-left float-sm-right">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="injected-svg icon" data-src="../assets/img/icons/theme/design/magic.svg">
                        <title>Icon For Magic</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect opacity="0" x="0" y="0" width="24" height="24"></rect>
                            <path d="M1,12 L1,14 L6,14 L6,12 L1,12 Z M0,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,15 C21,15.5522847 20.5522847,16 20,16 L0,16 C-0.55228475,16 -1,15.5522847 -1,15 L-1,11 C-1,10.4477153 -0.55228475,10 0,10 Z" fill="#000000" fill-rule="nonzero" transform="translate(10.000000, 13.000000) rotate(-225.000000) translate(-10.000000, -13.000000) "></path>
                            <path d="M17.5,12 L18.5,12 C18.7761424,12 19,12.2238576 19,12.5 L19,13.5 C19,13.7761424 18.7761424,14 18.5,14 L17.5,14 C17.2238576,14 17,13.7761424 17,13.5 L17,12.5 C17,12.2238576 17.2238576,12 17.5,12 Z M20.5,9 L21.5,9 C21.7761424,9 22,9.22385763 22,9.5 L22,10.5 C22,10.7761424 21.7761424,11 21.5,11 L20.5,11 C20.2238576,11 20,10.7761424 20,10.5 L20,9.5 C20,9.22385763 20.2238576,9 20.5,9 Z M21.5,13 L22.5,13 C22.7761424,13 23,13.2238576 23,13.5 L23,14.5 C23,14.7761424 22.7761424,15 22.5,15 L21.5,15 C21.2238576,15 21,14.7761424 21,14.5 L21,13.5 C21,13.2238576 21.2238576,13 21.5,13 Z" fill="#000000" opacity="0.3"></path>
                        </g>
                    </svg>
                    <span>Προσθήκη Συντελεστή</span>
                </a>
            </div>
        @endif
    </div>

    @empty($sintelestes)
        <p>Δεν υπάρχουν Συντελεστές</p>
    @else
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <th>Όνοματεπώνυμο</td>
                <th>Ιδιότητα</td>
                @if($own)<th>Αφαίρεση</th>@endif
            </thead>
            <tbody>
                @foreach($sintelestes as $s)
                    <tr>
                        <td>
                            <a href="{{ route('Sintelestis.show', ['id' => $s->Σ_ID]) }}">
                                {{ $s->Όνομα }} {{ $s->Επώνυμο }}
                            </a>
                            @if($own)

                            @endif
                        </td>
                        <td>{{ $s->Ιδιότητα }}</td>
                        @if($own)
                            <td>
                                <form action="{{route('TheatrikiParagwgi.removeSintelestis', ['id' => $paragwgi->ΘΠ_ID, 'sintelestis_id' => $s->Σ_ID])}}" method="post">
                                    <input type="hidden" name="idiotita" value="{{ $s->Ιδιότητα }}">
                                    <button type="submit" class="btn-link">Αφαίρεση</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endempty

    <div class="row">
        <div class="col-sm-6">
            <h2>Παραστάσεις</h2>
        </div>
        @if($own)
            <div class="col-sm-6">
                <a href="{{ route('Parastasi.create', $paragwgi->ΘΠ_ID) }}" class="m-1 btn btn-primary float-left float-sm-right">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="injected-svg icon" data-src="../assets/img/icons/theme/design/magic.svg">
                        <title>Icon For Magic</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect opacity="0" x="0" y="0" width="24" height="24"></rect>
                            <path d="M1,12 L1,14 L6,14 L6,12 L1,12 Z M0,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,15 C21,15.5522847 20.5522847,16 20,16 L0,16 C-0.55228475,16 -1,15.5522847 -1,15 L-1,11 C-1,10.4477153 -0.55228475,10 0,10 Z" fill="#000000" fill-rule="nonzero" transform="translate(10.000000, 13.000000) rotate(-225.000000) translate(-10.000000, -13.000000) "></path>
                            <path d="M17.5,12 L18.5,12 C18.7761424,12 19,12.2238576 19,12.5 L19,13.5 C19,13.7761424 18.7761424,14 18.5,14 L17.5,14 C17.2238576,14 17,13.7761424 17,13.5 L17,12.5 C17,12.2238576 17.2238576,12 17.5,12 Z M20.5,9 L21.5,9 C21.7761424,9 22,9.22385763 22,9.5 L22,10.5 C22,10.7761424 21.7761424,11 21.5,11 L20.5,11 C20.2238576,11 20,10.7761424 20,10.5 L20,9.5 C20,9.22385763 20.2238576,9 20.5,9 Z M21.5,13 L22.5,13 C22.7761424,13 23,13.2238576 23,13.5 L23,14.5 C23,14.7761424 22.7761424,15 22.5,15 L21.5,15 C21.2238576,15 21,14.7761424 21,14.5 L21,13.5 C21,13.2238576 21.2238576,13 21.5,13 Z" fill="#000000" opacity="0.3"></path>
                        </g>
                    </svg>
                    <span>Προσθήκη Παράστασης</span>
                </a>
            </div>
        @endif
    </div>
        @empty($parastaseis)
            <p>Δεν υπάρχουν Παραστάσεις</p>
        @else
            <div class = "table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th>Θέατρο</th>
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
                            <td><a href="{{ route('Theatro.show', $p->Θ_ID) }}">{{ $p->Όνομα }}</a></td>
                            <td>{{ $p->Όνομα_Αίθουσας }}</td>
                            <td>{{ $p->Σεζόν }}</td>
                            <td>{{ date('d-m-Y h:m' , strtotime($p->Έναρξη)) }}</td>
                            @auth
                                <td><a href="{{ route('Parastasi.show', $p->Π_ID) }}">Εισητήρια</a></td>
                            @endauth
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endempty

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
