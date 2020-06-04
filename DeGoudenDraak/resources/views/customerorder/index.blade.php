@extends('layouts.customer')

@section('content')
    <div>
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        <form action="/customer-order/{{$customer->id}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row d-flex justify-content-between pt-2">
                <h4><strong>{{ $customer->name }}, tafel: {{ $customer->tablenumber }}</strong></h4>
                <button class="btn btn-success">Hulp vragen</button>
            </div>
        </form>
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
        <div class="row d-flex justify-content-center mr-5 ml-5 mb-5">
            <div class="col-sm-8 d-flex flex-wrap justify-content-center" style="border-right: black 1px solid">

                @foreach($categories as $category)
                    <div class="shadow" style="width: 100%; background: red; color: yellow; text-align: center">
                        <h2>{{$category->name}}</h2>
                    </div>

                    @foreach($dishes as $dish)
                        @if($dish->dish_category == $category->id)
                        <!-- Modal -->
                            <div class="modal fade" id="add{{$dish->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">{{$dish->name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"></span>
                                                <span class="fas fa-window-close text-danger">X</span>
                                            </button>
                                        </div>
                                        <div>
                                            <add-order dish="{{$dish}}"></add-order>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card shadow m-2" style="width: 18rem;">
                                <h4 class="card-header d-flex justify-content-center" style="max-width: 100%">{!! $dish->name !!}</h4>
                                <div class="card-body d-flex flex-wrap justify-content-center">
                                    <p class="card-text" style="max-width: 100%"><strong>Beschrijving:</strong> {!! $dish->description !!} <br> <strong>Prijs:</strong> € {{$dish->price}}</p>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <button type="button" class="btn font-weight-bold float-right btn-primary" data-toggle="modal" data-target="#add{{$dish->id}}">Toevoegen</button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach

            </div>
            <div class="col-sm-4 justify-content-center">
                <h4 class="d-flex justify-content-center">Bestelling</h4>
                <table id="dishesTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Aantal</th>
                        <th>Prijs</th>
                        <th>Operatie</th>
                    </tr>
                    </thead>
                    <tbody id="body">

                    </tbody>
                </table>
                <hr>
                <div class="col-sm-4 justify-content-center align-self-end">
                    <h4 class="">Totaal: €
                        <span id="totalprice">0.00</span>
                    </h4>
                </div>
                <div>
                    @if($iswaiting)
                        <span class="d-none" id="minutes">{{$waittime}}</span>
                        <strong><span>Wacht <span id="time"></span> minuten tot uw volgende bestelling!</span></strong>
                    @else
                        <pay-order iscustomer customer-id="{{$customer->id}}"></pay-order>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function startTimer(duration, display) {
            let timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
                //TODO: check if element is visible only then activate this
                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = 0;
                    location.reload(true);
                }
            }, 1000);
        }

        window.onload = function () {
            let minutes = 60 * (10 - document.getElementById('minutes').innerText),
                display = document.getElementById('time')
            if(display != null)
            {
                startTimer(minutes, display);
            }
        };
    </script>
@endsection
