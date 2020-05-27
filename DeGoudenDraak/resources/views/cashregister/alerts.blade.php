@extends('layouts.cashregister')

@section('content')
    <div class="container ">
        <div class="justify-content-center m-5">
            <table id="EventsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Tijd</th>
                    <th>Tafelnummer</th>
                    <th>Klant naam</th>
                    <th>Operaties</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>30-05-2020 20:30</td>
                    <td>1</td>
                    <td>Je oma op een bakfiets</td>
                    <td><a href="/" class="btn btn-danger" style="max-height: 35px; min-height: 35px">Afgehandeld</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div
@endsection
