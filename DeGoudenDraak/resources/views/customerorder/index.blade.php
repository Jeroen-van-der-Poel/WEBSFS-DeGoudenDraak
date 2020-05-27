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
@endsection
