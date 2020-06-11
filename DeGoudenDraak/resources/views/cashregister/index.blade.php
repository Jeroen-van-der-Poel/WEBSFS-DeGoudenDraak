@extends('layouts.cashregister')

@section('content')
        <div class="row d-flex justify-content-center" style="width: 100%">
            <div class="col-sm-8 d-flex justify-content-center pt-4">

                <div class="col-sm-4 justify-content-center">
                        <label for="Points">Zoekcriteria Gerechten</label>
                    <br>
                        <input style="width: 250px" type="text" class="form-control" id="myInput" onkeyup="searchDish()"  required>
                </div>

                <div class="col-sm-4 justify-content-center">
                    <label for="Points">Zoekcriteria Categorieën</label>
                    <br>
                    <select id="categoryInput" onchange="searchCategory()">
                        <option value="NONE">Geen Categorie</option>
                        @foreach($categories as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-sm-4 justify-content-start">
            </div>

        </div>

    <div class="row d-flex justify-content-center m-5">
        <div class="col-sm-8 d-flex flex-wrap justify-content-center" style="border-right: black 1px solid">


            @foreach($categories as $category)
                <div class="category shadow" style="width: 100%; background: red; color: yellow; text-align: center">
                    <h2>{{$category->name}}</h2>
                </div>
                <div class="categoryItems" id="{{$category->name}}" style="display: flex; flex-wrap: wrap; justify-content: center">

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
                            <h4 class="card-header" style="max-width: 100%; display: flex; justify-content: center">{{$dish->menu_number}}{{$dish->menu_addition}}. {!! $dish->name !!}</h4>
                            <div class="card-body d-flex flex-wrap justify-content-center">
                                <p class="card-text" style="max-width: 100%"><strong>Beschrijving:</strong> {!! $dish->description !!} <br> <strong>Prijs:</strong> € {{$dish->price}}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <button type="button" class="btn font-weight-bold float-right btn-primary" data-toggle="modal" data-target="#add{{$dish->id}}">Toevoegen</button>
                            </div>
                        </div>
                    @endif
                @endforeach
                </div>
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
<script>
    function searchCategory() {
        // Declare variables
        let input, categories, categoryHeaders, categoryTexts, txtValue, i;

        input = document.getElementById('categoryInput').value;
        categories = document.getElementsByClassName("categoryItems");
        categoryHeaders = document.getElementsByClassName("category");
        categoryTexts = document.getElementsByTagName('h2');
        for(i = 0; i < categories.length; i++){

            if(categories[i].id === input){
                categories[i].style.display = "";
            }
            else if(input === "NONE"){
                categories[i].style.display = "";
            }
            else{
                categories[i].style.display = "none";
            }
        }

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < categoryHeaders.length; i++) {
            txtValue = categoryTexts[i].innerText;
            if (txtValue.indexOf(input) > -1) {
                categoryHeaders[i].style.display = "";
            }
            else if(input === "NONE"){
                categoryHeaders[i].style.display = "";
            }
            else {
                categoryHeaders[i].style.display = "none";
            }
        }
    }

    function searchDish() {
        // Declare variables
        let input, filter, cards, cardHeaders, txtValue, i;
        input = document.getElementById('myInput');
        filter = input.value.toUpperCase();
        cards = document.getElementsByClassName("card");
        cardHeaders = document.getElementsByClassName('card-header');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < cards.length; i++) {
            txtValue = cardHeaders[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }
</script>
