@extends('layouts.customer')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center pt-5">
            <h2>Bedankt voor uw bestelling</h2>
        </div>
        <div class="row flex-wrap">
            <div class="col-sm-12 d-flex justify-content-center">
                <h5>U kunt uw bestelling over 60 minuten komen ophalen!</h5>
            </div>
            <br>
            <div class="col-sm-12">
                <h4>Gegevens</h4>
                <ul>
                    <li><strong>Naam: </strong>{{ $customer->name }}</li>
                    <li><strong>Bestelnummer: </strong>{{ $ordernumber }}</li>
                </ul>
            </div>
            <div class="col-sm-12">
                <h4>Gerechten</h4>
                <ul>
                    @foreach($dishes as $dish)
                        <li>{{$dish->menu_number}}{{$dish->menu_addition}}, {{$dish->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 d-flex justify-content-center">
                <h2>QRcode</h2>
            </div>
            <div class="col-sm-12 d-flex justify-content-center">
                <h5>Print de qrcode en laat hem bij de kassa scannen, om je bestelling te ontvangen!</h5>
            </div>
            <img src="https://api.qrserver.com/v1/create-qr-code/?data=Ordernummer: {{ $ordernumber }}, Gerechten: {{ $dishes }}, Naam: {{ $customer->name }} }}&size=220x220&margin=0" alt="qrcode">
        </div>
    </div>
@endsection

