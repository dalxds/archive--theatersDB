@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $etairia->Όνομα }}</h1>

    <h2>Παραγωγές</h2>
    @empty($paragwges)
        Δεν υπάρχουν Παραγωγές
    @else
        <table>
            <!-- <thead>
                <td>Τίτλος</td>
            </thead> -->
            <tbody>
                @foreach($paragwges as $p)
                    <tr>
                        <td>
                            <a href="{{ route('TheatrikiParagwgi.show', ['id' => $p->ΘΠ_ID]) }}">
                                {{ $p->Τίτλος }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endempty
    <a href="{{ route('TheatrikiParagwgi.create') }}">Δημιουργία Νέας Θεατρικής Παραγωγής</a>
</div>
@endsection
