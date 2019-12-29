@extends('layouts.app')

@section('content')
    <CreateParastasi
        :theatra="{{ json_encode($theatra) }}"
        :theatrikiparagwgi="{{ $paragwgi->ΘΠ_ID }}"
    ></CreateParastasi>
@endsection
