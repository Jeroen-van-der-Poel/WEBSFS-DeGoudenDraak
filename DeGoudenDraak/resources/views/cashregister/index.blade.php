@extends('layouts.cashregister')

@section('content')
    <div class="row d-flex justify-content-center m-5">
        <div class="col-sm-8 d-flex flex-wrap justify-content-center" style="border-right: black 1px solid">

            <div class="card shadow m-2" style="width: 18rem;">
                <h4 class="card-header d-flex justify-content-center" style="max-width: 100%">1. Soep Ling Fa</h4>
                <div class="card-body d-flex flex-wrap justify-content-center">
                    <p class="card-text" style="max-width: 100%">$3.00</p>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <a href="/Evenementen" class="btn btn-primary" style="max-height: 35px; min-height: 35px">Toevoegen</a>
                </div>
            </div>

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
