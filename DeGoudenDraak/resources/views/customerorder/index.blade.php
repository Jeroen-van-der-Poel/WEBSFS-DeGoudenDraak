@extends('layouts.customer')

@section('content')

    <div class="container">
        <div class="row d-flex justify-content-between pt-2">
            <h4><strong>{{ $customer->name }}, tafel: {{ $customer->tablenumber }}</strong></h4>
            <button class="btn btn-success">Hulp vragen</button>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row pt-3">
            <h1>Geschiedenis</h1>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row pt-3">
            <h1>Bestellen</h1>
        </div>
    </div>
@endsection
