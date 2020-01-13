@extends('layouts.app')

@section('content')
    <h1>Προσεχώς Παραστάσεις</h1>
    <div class = "table-responsive">
        <table class="table table-hover">
            <thead>
                <th>Τίτλος</th>
                <th>Θέατρο</th>
            </thead>
            <tbody>
            @foreach($prosexws as $p)
                <tr>
                    <td><a href="{{ route('TheatrikiParagwgi.show', $p->ΘΠ_ID) }}">{{ $p->Τίτλος_Παραγωγής }}</a></td>
                    <td><a href="{{ route('Theatro.show', $p->Θ_ID) }}">{{ $p->Θέατρο }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
