@extends('layouts.customer')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center pt-5">
            <h2>Bedankt voor uw bestelling</h2>
        </div>
        <div class="row flex-wrap">
            <p>U kunt uw bestelling over 60 minuten komen ophalen</p>
            <br>
            <h4>Gegevens:</h4>
            <br>
            <ul>
                <li>hoi</li>
            </ul>
        </div>
        <hr>
        <div class="row">
            <h2>QRcode</h2>
            <img src="https://api.qrserver.com/v1/create-qr-code/?data=%7B%7B url('http://127.0.0.1:8000/dashboard') }}&size=220x220&margin=0" alt="qrcode">
        </div>
    </div>
@endsection

