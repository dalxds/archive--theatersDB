@extends('layouts.app')

@section('content')
<section class="has-divider bg-primary-2 text-light">
    <div class="container">
        <div class="row">
        <div class="col">
            <h1>Αξιολόγηση Παραγωγής <b>{{$paragwgi->Τίτλος}}</b></h1>
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
    <form action = "{{ route('Axiologisi.store', $paragwgi->ΘΠ_ID) }}" method = "POST">
            <div class = "form-group">
                <label>Βαθμολογία:</label>
                <input class="form-control form-control-lg" name="vathmologia" type="number" step="0.1" min="0" max="10" value="10.0" required/>
            </div>
            <div class = "form-group">
                <label> Περιγραφή:</label>
                <textarea class = "form-control form-control-lg" name="perigrafi"></textarea>
            </div>
        <button type="submit" class="submit_btn btn-lg btn-primary-2">Καταχώρηση</button>
    </form>
</div>
@endsection

