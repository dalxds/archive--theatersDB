@extends('layouts.app')

@section('content')
<div class = "container">
    
    <h1>{{ $sintelestis->Όνομα }} {{ $sintelestis->Επώνυμο }}</h1>

    <h2>Θεατρικές Παραγωγές</h2>
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
