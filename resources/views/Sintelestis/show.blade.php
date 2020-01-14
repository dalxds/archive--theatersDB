@extends('layouts.app')

@section('content')
<div class = "container py-4">
    
    <h1>{{ $sintelestis->Όνομα }} {{ $sintelestis->Επώνυμο }}</h1>

    <h4>Βιογραφικό</h4>
    <p>{{ $sintelestis-> Βιογραφικό }}</p>
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
