@extends('layouts.app')

@section('content')
    <section class="has-divider bg-primary-2 text-light">
            <div class="container">
                <div class="row">
                <div class="col">
                    <h1>Προσθήκη Συντελεστή <b>{{ $paragwgi->Τίτλος }}</b></h1>
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
        <form action="{{route('TheatrikiParagwgi.addSintelestis', $paragwgi->ΘΠ_ID)}}" method="post">
            <div class = "form-group">
                <label>Συντελεστής</label>
                <select name="sintelestis_id" class="form-control form-control-lg">
                        <option value="" disabled="disabled" selected="selected">Επιλέξτε Συντελεστή</option>
                    @foreach($all_sintelestes as $s)
                        <option value="{{ $s->Σ_ID }}">{{ $s->Όνομα }} {{ $s->Επώνυμο }}</option>
                    @endforeach
                </select>
            </div>
            <div class = "form-group">
                <label>Ιδιότητα</label>
                <input class="form-control form-control-lg" name="idiotita" placeholder="Πχ. Ηθοποιός" required>
            </div>
            
            <br/>
            <button type="submit" class="submit_btn btn-lg btn-primary-2">Προσθήκη</button>
        </form>
    </div>
@endsection
