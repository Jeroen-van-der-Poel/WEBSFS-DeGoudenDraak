@extends('layouts.customer')

@section('content')
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
                                            <add-order dish="{{$dish->name}}" customer-id="{{$customer->id}}"></add-order>
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
                <table id="EventsTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Nummer</th>
                        <th>Naam</th>
                        <th>Aantal</th>
                        <th>Prijs</th>
                        <th>Operatie</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>
                            <a href="/" class="btn btn-danger" style="max-height: 35px; min-height: 35px">-</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <hr>
                <div class="col-sm-3 justify-content-center align-self-end">
                    <h4 class="d-flex">Totaal: <p class="pl-2">$0,00</p></h4>
                </div>
                <span>
                    <a href="/" class="btn btn-danger" style="max-height: 35px; min-height: 35px">Verwijderen</a>
                    <a href="/" class="btn btn-success" style="max-height: 35px; min-height: 35px">Afrekenen</a>
                </span>
            </div>
        </div>
@endsection
