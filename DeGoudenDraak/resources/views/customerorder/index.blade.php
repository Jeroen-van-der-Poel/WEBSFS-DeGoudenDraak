@extends('layouts.customer')

@section('content')

    <div class="container">
        <div class="row d-flex justify-content-between">
            <h4>{{ $customer->name }}, tafel: {{ $customer->tablenumber }}</h4>
            <button class="btn btn-success">Hulp vragen</button>
        </div>
    </div>

    <div class="container">
        <div class="row pt-3">
            <h1>Bestellen</h1>
        </div>
    </div>

    <div class="container">
        <div class="row pt-3">
            <h1>Geschiedenis</h1>
        </div>
    </div>
@endsection
