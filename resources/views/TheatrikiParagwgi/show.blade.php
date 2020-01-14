@extends('layouts.app')

@section('content')
<section class="has-divider bg-primary-2 text-light">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1> {{ $paragwgi->Τίτλος }} </h1>
            </div>
            <div class="col-sm-6">
                <div class="float-left float-sm-right">
                    <a href="#ratings" class="m-1 btn btn-primary py-3">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="injected-svg icon">
                            <title>Icon For Star</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" opacity="0"></polygon>
                            <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"></path>
                            </g>
                        </svg>
                        <span>{{ collect($axiologiseis)->avg(function($a) { return $a->Βαθμολογία; }) }} ({{ count($axiologiseis) }}) </span>
                    </a>
                    @guest
                    @else
                        @if(!$own_axiologisi)
                            <a href="{{ route('Axiologisi.create', $paragwgi->ΘΠ_ID) }}" class="m-1 btn btn-primary py-3">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="injected-svg icon">
                                    <title>Icon For Like</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect opacity="0" x="0" y="0" width="24" height="24"></rect>
                                        <path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000"></path>
                                        <rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1"></rect>
                                    </g>
                                </svg>
                                <span>Αξιολόγησε</span>
                            </a>
                        @endif
                    @endguest
                </div>
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
    <div class="row">
        <div class="col">
            <h2>Περίληψη</h2>
            <p>{{ $paragwgi->Περιγραφή }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <h2>Συντελεστές</h2>
        </div>
        @if($own)
            <div class="col-sm-6">
                <a href="{{ route('TheatrikiParagwgi.addSintelestisForm', $paragwgi->ΘΠ_ID) }}" class="m-1 btn btn-primary float-left float-sm-right">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="injected-svg icon">
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

    <h2 id="ratings">Αξιολογήσεις</h2>
    @guest
        <p>Κάνε log in για να αξιολογήσεις την παραγωγή {{ $paragwgi->Τίτλος }}</p>
    @endguest

    @empty($axiologiseis)
        <p>Δεν υπάρχουν αξιολογήσεις</p>
    @else
        <div class = "table-responsive">
            <table class="table table-hover">
                <thead>
                <th>Όνομα Θεατή</th>
                <th>Βαθμολογία</th>
                <th>Περιγραφή</th>
                </thead>
                @foreach($axiologiseis as $a)
                    <tr class="{{ (($own_axiologisi or false) && $own_axiologisi->ΘΕ_ID == $a->ΘΕ_ID) ? 'own-rating' : '' }}">
                        <td><a href="{{route('Theatis.show', $a->ΘΕ_ID)}}">{{$a->Όνομα}} {{$a->Επώνυμο }}</a></td>
                        <td>{{$a->Βαθμολογία}}</td>
                        <td>{{$a->Περιγραφή}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endempty
</div>
@endsection
