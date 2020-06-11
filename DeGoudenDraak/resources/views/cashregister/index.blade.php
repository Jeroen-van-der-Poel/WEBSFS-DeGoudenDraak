@extends('layouts.cashregister')

@section('content')
    <div class="row d-flex justify-content-center m-5">
        <div class="col-sm-8 d-flex flex-wrap justify-content-center" style="border-right: black 1px solid">

            <div class="row d-flex justify-content-center">
                <form action="/FilterCashRegisterDishes" method="POST">
                    @method('PATCH')
                    {{@csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Points">Zoekcriteria Gerechten</label>
                            <input title="Filter op alle gerechten via de criteria; Naam en Beschrijving." type="text" class="form-control" name="filter" id="filter" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="/cashregister/index"><button title="Laat alle gerechten weer zien nadat er gefilterd is via de zoekcriteria en zoekfunctie." type="button"  class="btn btn-secondary" data-dismiss="modal"> Laat alles weer zien</button></a>
                        <div class="form-group">
                            <input title="Zoek op basis van de ingevulde zoekcriteria." type="submit" class="btn btn-success" value="Zoeken">
                        </div>
                    </div>
                </form>
            </div>

            <div class="row d-flex justify-content-center pl-4">
                <form action="/FilterCashRegisterCategories" method="POST">
                    @method('PATCH')
                    {{@csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Points">Zoekcriteria Categorieën</label>
                            <input title="Filter op alle categorieën via de criteria; Naam." type="text" class="form-control" name="filter" id="filter" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="/cashregister/index"><button title="Laat alle categorieën weer zien nadat er gefilterd is via de zoekcriteria en zoekfunctie." type="button"  class="btn btn-secondary" data-dismiss="modal"> Laat alles weer zien</button></a>
                        <div class="form-group">
                            <input title="Zoek op basis van de ingevulde zoekcriteria." type="submit" class="btn btn-success" value="Zoeken">
                        </div>
                    </div>
                </form>
            </div>

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
                                    <div>
                                        <add-order dish="{{$dish}}"></add-order>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card shadow m-2" style="width: 18rem;">
                            <h4 class="card-header d-flex justify-content-center" style="max-width: 100%">{{$dish->menu_number}}{{$dish->menu_addition}} {!! $dish->name !!}</h4>
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
                <pay-order user-id="{{auth()->user()->id}}"></pay-order>
            </div>
        </div>
    </div>

@endsection
