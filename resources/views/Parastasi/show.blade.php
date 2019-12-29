@extends('layouts.app')

@section('content')
    <h1>Παράσταση - {{ $paragwgi->Τίτλος }}</h1>
    <div>Μειωμένα Εισιτήρια: {{ $reduced_tickets }}</div>
    <div>Κανονικά Εισιτήρια: {{ $normal_tickets }}</div>

    <br/>
    @guest
        Κάντε log in για να κλείσετε εισιτήρια
    @else
        @if($reduced_tickets > 0)
            <form method="POST" action="{{ route('Eisitirio.checkin', $parastasi->Π_ID) }}">
                <input type="hidden" name="type" value="ΜΕΙΩΜΕΝΟ">
                <input type="submit" class="btn btn-secondary" value="Κατοχύρωση Μειωμένου Εισιτηρίου"></input>
            </form>
        @endif

        @if($normal_tickets > 0)
            <form method="POST" action="{{ route('Eisitirio.checkin', $parastasi->Π_ID) }}">
                <input type="hidden" name="type" value="ΚΑΝΟΝΙΚΟ">
                <input type="submit" class="btn btn-secondary" value="Κατοχύρωση Κανονικού Εισιτηρίου"></input>
            </form>
        @endif

        @if($user_tickets)
            <h2>Τα Εισιτήρια Σου</h2>
            <table class="striped table">
                <thead>
                    <td>Θέση</td>
                    <td>Σειρά</td>
                    <td>Τύπος Εισιτηρίου</td>
                    <td>Τιμή</td>
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
        @endif
    @endguest
@endsection
