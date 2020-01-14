@extends('layouts.app')

@section('content')

<section class="has-divider bg-primary-2 text-light">
        <div class="container">
            <div class="row">
            <div class="col">
                <h1>{{ $paragwgi->Τίτλος }}</h1>
                <h2>{{date('d-m-Y h:m' , strtotime($parastasi->Έναρξη))}}</h2>
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
    <div class = "buy-tickets">
        <form class ="buy-tickets-form" method="POST" action="{{ route('Eisitirio.checkin', $parastasi->Π_ID) }}">
            <input type = "hidden" name = "type" value = "ΚΑΝΟΝΙΚΟ">
            <button type = "submit" class = "btn btn-primary mb-4">
                Κανονικό Εισιτήριο
                <span class = "badge badge-light">{{ $normal_tickets }}</span>
            </button>
        </form>

        <form class ="buy-tickets-form" method = "POST" action = "{{ route('Eisitirio.checkin', $parastasi->Π_ID) }}">
            <input type = "hidden" name = "type" value = "ΜΕΙΩΜΕΝΟ">
            <button type = "submit" class = "btn btn-primary mb-4">
                Μειωμένο Εισιτήριο
                <span class = "badge badge-light">{{ $reduced_tickets }}</span>
            </button>
        </form>
    </div>

    @guest
        <p>Κάντε log in για να αγοράσετε εισιτήρια</p>
    @else

        @if($user_tickets)
            <h2>Αγορασμένα Εισιτήρια</h2>
            <div class = "table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th>Θέση</th>
                        <th>Σειρά</th>
                        <th>Τύπος Εισιτηρίου</th>
                        <th>Τιμή</th>
                    </thead>
                    <tbody>
                        @foreach ($user_tickets as $t)
                            <tr>
                                <td>{{ $t->Θέση }}</td>
                                <td>{{ $t->Σειρά }}</td>
                                <td>{{ $t->{'Τύπος Εισιτηρίου'} }}</td>
                                <td>{{ $t->Τιμή }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>
        @endif
    @endguest
@endsection
