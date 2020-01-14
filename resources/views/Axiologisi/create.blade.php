@extends('layouts.app')

@section('content')
<div class = "container">
    <h1>Αξιολόγηση Παραγωγής - {{$paragwgi->Τίτλος}}</h1>
        <form action = "{{ route('Axiologisi.store', $paragwgi->ΘΠ_ID) }}" method = "POST">
                <div class = "form-group">
                    <label>Βαθμολογία:</label>
                    <input class = "form-control form-control-lg" name="vathmologia" type="number" step="0.1" min="0" max="10" value="10.0" required/>
                </div>
                <div class = "form-group">
                    <label> Περιγραφή:</label>
                    <textarea class = "form-control form-control-lg" name="perigrafi"></textarea>
                </div>
            <button type="submit" class="submit_btn btn-lg btn-primary-2">Καταχώρηση</button>
        </form>
</div>
@endsection

