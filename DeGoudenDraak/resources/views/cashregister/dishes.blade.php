@extends('layouts.cashregister')

@section('content')

    <div class="row d-flex justify-content-center m-5">
        <div class="d-flex justify-content-center">
            <h1>Menu</h1>
        </div>
    </div>
    <div class="container">
        <table class="blueTable">
            <thead>
            <tr>
                <th style="text-align: center">Menunummer</th>
                <th style="text-align: center">Naam</th>
                <th style="text-align: center">Beschrijving</th>
                <th style="text-align: center; width: 100px">Prijs</th>
            </tr>
            </thead>

            <tbody>
            @foreach($dishes as $dish)
                <tr>
                    <td style="text-align: center">{{$dish->menu_number}}{{$dish->menu_addition}}</td>
                    <td style="text-align: center">{!!$dish->name!!}</td>
                    <td style="text-align: center">{!!$dish->description!!}</td>
                    <td style="text-align: center">€ {{$dish->price}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
<style type="text/css">
    .blueTable{
        width:100%;
        border-collapse:collapse;
    }
    .blueTable td{
        padding:7px; border:#4e95f4 1px solid;
    }
    /* provide some minimal visual accomodation for IE8 and below */
    .blueTable tr{
        background: #b8d1f3;
    }
    /*  Define the background color for all the ODD background rows  */
    .blueTable tr:nth-child(odd){
        background: #b8d1f3;
    }
    /*  Define the background color for all the EVEN background rows  */
    .blueTable tr:nth-child(even){
        background: #dae5f4;
    }
</style>
