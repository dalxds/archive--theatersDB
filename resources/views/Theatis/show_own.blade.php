@extends('layouts.app')

@section('content')
<section class="has-divider bg-primary-2 text-light">
    <div class="container">
        <div class="row">
        <div class="col">
            <h1>{{ $theatis->Όνομα }} {{ $theatis->Επώνυμο }}</h1>
        </div>
        </div>
    </div>
    <div class="divider">
        <svg width="100%" height="96px" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" class="injected-svg bg-white">
            <path d="M0,0 C40,33 66,52 75,52 C83,52 92,33 100,0 L100,100 L0,100 L0,0 Z"></path>
        </svg>
    </div>
</section>

<div class = "container py-4">
    <h2>Στοιχεία Χρήστη</h2>
    <form action = "{{ route('Theatis.update', $theatis->ΘΕ_ID) }}" method = "POST">
        <div class = "form-row">
            <div class = "form-group col-sm">
                <label for = "onoma">Όνομα</label>
                <input type = "text" class = "form-control form-control-lg" name = "onoma" value = "{{ $theatis->Όνομα ?? '' }}" placeholder = "Πληκτρολογήστε το όνομά σας">
            </div>
            <div class = "form-group col-sm">
                <label for = "epwnymo">Επώνυμο</label>
                <input type = "text" class = "form-control form-control-lg" name = "epwnymo" value = "{{ $theatis->Επώνυμο ?? '' }}" placeholder = "Πληκτρολογήστε το επώνυμό σας">
            </div>
        </div>
        <div class = "form-row">
            <div class="form-group col-sm">
                <label for = "email">Email</label>
                <input type = "email" class = "form-control form-control-lg" name = "email" value = "{{ $theatis->Email ?? '' }}" placeholder = "Πληκτρολογήστε το email σας">
            </div>
            <div class = "form-group col-sm">
                <label for = "tilefwno">Τηλέφωνο</label>
                <input type = "text" class = "form-control form-control-lg" name = "tilefwno" value = "{{ $theatis->Τηλέφωνο ?? '' }}" placeholder = "Πληκτρολογήστε το τηλέφωνό σας">
            </div>
        </div>
        <button type="submit" class="submit_btn btn-lg btn-primary-2">Ενημέρωση Στοιχείων</button>
        <!-- <button type="submit" class="m-1 btn btn-primary-2" value="Ενημέρωση"></button> -->
    </form>

    <section>
        <ul class ="nav nav-tabs justify-content-center border-bottom pb-2" role="tablist">
            <li class ="nav-item mx-1">
                <a class ="nav-link active" id ="upcoming-tickets-tab" data-toggle="tab" href ="#upcoming-tickets" role="tab" aria-controls="upcoming-tickets" aria-selected="true">
                    <div class ="icon-round icon-round-sm bg-primary">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="injected-svg icon bg-primary">
                            <title>Icon For Tickets</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect opacity="0" x="0" y="0" width="24" height="24"></rect>
                                <path d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z" fill="#000000" fill-rule="nonzero"></path>
                                <path d="M10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L10.1818182,16 C8.76751186,16 8,15.2324881 8,13.8181818 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 Z" fill="#000000" opacity="0.3"></path>
                            </g>
                        </svg>
                    </div>
                    Μελλοντικά Εισιτήρια
                </a>
            </li>
            <li class ="nav-item mx-1">
                <a class ="nav-link" id ="past-tickets-tab" data-toggle="tab" href = "#past-tickets" role="tab" aria-controls="past-tickets" aria-selected="false">
                    <div class ="icon-round icon-round-sm bg-primary">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="injected-svg icon bg-primary">
                            <title>Icon For Tickets</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect opacity="0" x="0" y="0" width="24" height="24"></rect>
                                <path d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z" fill="#000000" fill-rule="nonzero"></path>
                                <path d="M10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L10.1818182,16 C8.76751186,16 8,15.2324881 8,13.8181818 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 Z" fill="#000000" opacity="0.3"></path>
                            </g>
                        </svg>
                    </div>
                    Παλιά Εισιτήρια
                </a>
            </li>
            <li class ="nav-item mx-1">
                <a class ="nav-link" id ="reviews-tab" data-toggle="tab" href ="#reviews" role="tab" aria-controls="past-tickets" aria-selected="false">
                    <div class ="icon-round icon-round-sm bg-primary">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="injected-svg icon">
                        <title>Icon For Star</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" opacity="0"></polygon>
                            <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"></path>
                        </g>
                    </svg>
                    </div>
                    Αξιολογήσεις
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="upcoming-tickets" role="tabpanel" aria-labelledby="upcoming-tickets-tab">
                @include('partials.TicketTable', ['tickets' => $upcoming_tickets])
            </div>
            <div class="tab-pane" id="past-tickets" role="tabpanel" aria-labelledby="past-tickets-tab">
                @include('partials.TicketTable', ['tickets' => $past_tickets])
            </div>
            <div class="tab-pane" id="reviews" role="tabpanel" aria-labelledby="past-tickets-tab">
                @include('Theatis.axiologiseis', compact('axiologiseis'))
            </div>
        </div>
    </section>
</div>
@endsection
