@extends('layouts.cashregister')

@section('content')
    <div class="row d-flex justify-content-center m-5">
        <div class="col-sm-4 d-flex flex-wrap justify-content-center" style="border-right: black 1px solid">
            <div class="flex-wrap justify-content-center">
                <div style="max-width: 100%">
                <form action="/FilterSales" method="POST">
                    @method('PATCH')
                    {{@csrf_field()}}
                        <strong>Begin datum:</strong> <input id="startDate" name="startDate" type="datetime-local" required>
                        <br>
                        <strong>Eind datum:</strong> <input id="endDate" name="endDate" type="datetime-local" required>
                        <input class="btn btn-sm btn-success" type="submit">
                </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8 justify-content-center">
            <div class="col-sm-4 d-flex flex-wrap justify-content-center" style="max-width: 100%">
                <div class="col-sm-4 flex-wrap">
                    <strong>Omzet: </strong> € {{round($revenue, 2)}}
                </div>
                <div class="col-sm-4 flex-wrap">
                    <strong>BTW: </strong> € {{round($revenueBTW, 2)}}
                </div>
                <div class="col-sm-4 flex-wrap">
                    <strong>excl. BTW: </strong> € {{round($revenueWithoutBTW, 2)}}
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="justify-content-center">
            <table id="EventsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Datum</th>
                    <th>Gerecht</th>
                    <th>Prijs</th>
                    <th>Aantal</th>
                    <th>Commentaar</th>
                    <th>Subtotaal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($userOrders as $userOrder)
                    <tr>
                        <td>{{$userOrder->sale_date}}</td>
                        <td>{!!$userOrder->dish->name!!}</td>
                        <td>€ {{$userOrder->dish->price}}</td>
                        <td>{{$userOrder->amount}}</td>
                        @if($userOrder->comment != null)
                            <td>{{$userOrder->comment}}</td>
                        @else
                            <td> </td>
                        @endif
                        <td>€ {{$userOrder->amount * $userOrder->dish->price}}</td>
                    </tr>
                @endforeach
                @foreach($customerOrders as $customerOrder)
                    <tr>
                        <td>{{$customerOrder->sale_date}}</td>
                        <td>{!!$customerOrder->dish->name!!}</td>
                        <td>€ {{$customerOrder->dish->price}}</td>
                        <td>{{$customerOrder->amount}}</td>
                        @if($customerOrder->comment != null)
                        <td>{{$customerOrder->comment}}</td>
                        @else
                            <td> </td>
                        @endif
                        <td>€ {{$customerOrder->amount * $customerOrder->dish->price}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div
@endsection
