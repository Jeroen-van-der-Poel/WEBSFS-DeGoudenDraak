<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>
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
                        <li>Menu nummer: {{$dish->menu_number}}{{$dish->menu_addition}}, {{$dish->name}}</li>
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
                <h5>Print de QRcode uit en laat hem bij de kassa scannen, om je bestelling te ontvangen!</h5>
            </div>
            <img id="qr" src="https://api.qrserver.com/v1/create-qr-code/?data= Bestelnummer: {{ $ordernumber }}, Naam: {{ $customer->name }} , Gerecht nummer(s): {{ $string }} &size=220x220&margin=0" alt="qrcode">
            <div class="col-sm-12 d-flex justify-content-center pt-3">
                <button class="btn btn-primary" onclick="window.print()">Print</button>
            </div>
        </div>
        <hr>
        <div class="row d-flex justify-content-center pt-5">
            <a href="/#">
                <button class="btn btn-primary" style="width: 400px">Terug naar website</button>
            </a>
        </div>
    </div>
</body>

