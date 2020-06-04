@extends('layouts.cashregister')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="container">
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
                @foreach($alerts as $alert)
                    <tr>
                        <td>{{$alert->created_at}}</td>
                        <td>{{$alert->customer()->pluck('tablenumber')->implode('')}}</td>
                        <td>{{$alert->customer()->pluck('name')->implode('')}}</td>
                        <td>
                            <form method="POST" action="/cashregister/alerts/finish-alert/{{$alert->id}}">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="submit" value="Afhandelen" class="btn btn-success">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div
@endsection
