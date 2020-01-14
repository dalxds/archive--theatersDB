@empty($axiologiseis)
    <p>Δεν υπάρχουν αξιολογήσεις</p>
@else
    Συνολικές Αξιολογήσεις: {{ count($axiologiseis) }}
    <div class = "table-responsive">
        <table class="table table-hover">
            <thead>
            <th>Τίτλος</th>
            <th>Βαθμολογία</th>
            <th>Περιγραφή</th>
            </thead>
            @foreach($axiologiseis as $a)
                <tr>
                    <td><a href="{{route('TheatrikiParagwgi.show', $a->ΘΠ_ID)}}">{{$a->Τίτλος}}</a></td>
                    <td>{{$a->Βαθμολογία}}</td>
                    <td>{{$a->Περιγραφή}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endempty
