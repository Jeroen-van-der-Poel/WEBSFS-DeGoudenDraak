@extends('layouts.cashregister')

@section('content')
    <div class="row d-flex justify-content-center m-5">
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
                                        <h5 class="modal-title" id="myModalLabel">Gerecht toevoegen aan order</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"></span>
                                            <span class="fas fa-window-close text-danger">X</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{$dish->name}}
                                        <input class="float-right" type="number" id="points" name="points" min="1" max="100" value="1">
                                    </div>
                                    <div class="modal-footer">
                                        <input class="btn btn-sm btn-success" type="submit">
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
                        <a href="/" class="btn btn-danger" style="max-height: 35px; min-height: 35px">Verwijderen</a>
                    </td>
                </tr>
            </tbody>
            </table>
            <hr>
            <div class="col-sm-3 justify-content-center align-self-end">
                <h4 class="d-flex">Totaal: <p class="pl-2">$0,00</p></h4>
                <a href="/" class="btn btn-success" style="max-height: 35px; min-height: 35px">Afrekenen</a>
                <a href="/" class="btn btn-danger" style="max-height: 35px; min-height: 35px">Verwijderen</a>
            </div>
        </div>
    </div>

@endsection
