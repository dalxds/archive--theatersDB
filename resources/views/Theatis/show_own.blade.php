@extends('layouts.app')

@section('content')
    <h1>Προφίλ Θεατή - {{ $theatis->Όνομα }} {{ $theatis->Επώνυμο }}</h1>
    <form action="{{ route('Theatis.update', $theatis->ΘΕ_ID) }}" method="POST">
        <div class="form-group">
            <label for="onoma">Όνομα</label>
            <input type="text" class="form-control" name="onoma" value="{{ $theatis->Όνομα ?? '' }}" placeholder="Πληκτρολογήστε το όνομά σας">
        </div>
        <div class="form-group">
            <label for="epwnymo">Επώνυμο</label>
            <input type="text" class="form-control" name="epwnymo" value="{{ $theatis->Επώνυμο ?? '' }}" placeholder="Πληκτρολογήστε το επώνυμό σας">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $theatis->Email ?? '' }}" placeholder="Πληκτρολογήστε το email σας">
        </div>
        <div class="form-group">
            <label for="tilefwno">Τηλέφωνο</label>
            <input type="text" class="form-control" name="tilefwno" value="{{ $theatis->Τηλέφωνο ?? '' }}" placeholder="Πληκτρολογήστε το τηλέφωνό σας">
        </div>

        <input type="submit" value="Ενημέρωση">
    </form>

    <h2>Μελλοντικά Εισιτήρια</h2>
    @include('partials.TicketTable', ['tickets' => $upcoming_tickets])

    <h2>Παλιά Εισιτήρια</h2>
    @include('partials.TicketTable', ['tickets' => $past_tickets])

    <h2>Αξιολογήσεις Παραστάσεων</h2>
    @include('Theatis.axiologiseis', compact('axiologiseis'))
@endsection
