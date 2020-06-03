@extends('layouts.cashregister')

@section('content')
    <div class="row d-flex justify-content-center m-5">
        <div class="col-sm-4 d-flex flex-wrap justify-content-center" style="border-right: black 1px solid">
            <div class="flex-wrap justify-content-center">
                <p style="max-width: 100%">
                    <strong>Begin datum:</strong> <input type="datetime-local">
                    <br>
                    <strong>Eind datum:</strong> <input type="datetime-local">
                </p>
            </div>
        </div>
        <div class="col-sm-8 justify-content-center">
            <div class="col-sm-4 d-flex flex-wrap justify-content-center" style="max-width: 100%">
                <div class="col-sm-4 flex-wrap">
                    <strong>Omzet: </strong> € 0,00
                </div>
                <div class="col-sm-4 flex-wrap">
                    <strong>BTW: </strong> € 0,00
                </div>
                <div class="col-sm-4 flex-wrap">
                    <strong>excl. BTW: </strong> € 0,00
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="justify-content-center">
            <table id="EventsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Datum</th>
                    <th>Gerecht</th>
                    <th>Prijs</th>
                    <th>Aantal</th>
                    <th>Subtotaal</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($customerOrders as $customerOrder)
                        <td>{{$customerOrder->id}}</td>
                        <td>test</td>
                        <td>€ test</td>
                        <td>5</td>
                        <td>€ test</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>
    </div
@endsection
