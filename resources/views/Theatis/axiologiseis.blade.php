<div class="row align-items-center">
    <div class="col-sm-6">
        <h2>Αξιολογήσεις Παραστάσεων</h2>
    </div>
    <div class="col-sm-6">
        <p class="float-left float-sm-right">Συνολικές Αξιολογήσεις: <b>{{ count($axiologiseis) }}</b></p>
    </div>
</div>
@empty($axiologiseis)
    <p>Δεν υπάρχουν αξιολογήσεις</p>
@else
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
