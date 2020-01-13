<h2>Αξιολογήσεις Παραστάσεων</h2>
@empty($axiologiseis)
    Δεν υπάρχουν αξιολογήσεις
@else
    Συνολικές Αξιολογήσεις: {{ count($axiologiseis) }} - Μέσος Όρος Βαθμολογίας: {{ collect($axiologiseis)->avg(function($a) { return $a->Βαθμολογία; }) }}
    <div class = "table-responsive">
        <table class="table table-hover">
            <thead>
            <th>Όνομα Θεατή</th>
            <th>Βαθμολογία</th>
            <th>Περιγραφή</th>
            </thead>
            @foreach($axiologiseis as $a)
                <tr class="{{ (($own_axiologisi or false) && $own_axiologisi->ΘΕ_ID == $a->ΘΕ_ID) ? 'bg-info' : '' }}">
                    <td><a href="{{route('Theatis.show', $a->ΘΕ_ID)}}">{{$a->Επώνυμο }} {{$a->Όνομα}}</a></td>
                    <td>{{$a->Βαθμολογία}}</td>
                    <td>{{$a->Περιγραφή}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endempty
