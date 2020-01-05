<div class= "table-responsive">
    <table class="table table-hover">
        <thead>
            <th>Παράσταση</th>
            <th>Θέατρο - Αίθουσα</th>
            <th>Σειρά</th>
            <th>Θέση</th>
        </thead>
        <tbody>
            @foreach($tickets as $t)
                <tr>
                    <td><a href="{{ route('TheatrikiParagwgi.show', $t->ΘΠ_ID) }}">{{ $t->Τίτλος }}</a></td>
                    <td><a href="{{ route('Theatro.show', $t->Θ_ID) }}">{{ $t->Όνομα }} - {{ $t->Όνομα_Αίθουσας }}</a></td>
                    <td>{{ $t->Σειρά }}</td>
                    <td>{{ $t->Θέση }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>