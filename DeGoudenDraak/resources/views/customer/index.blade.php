@extends('layouts.navbar')

@section('content')
    <div class="container">
        <form action="/tablenumber" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row d-flex justify-content-center m-5">
                <h1>Vul de gegevens in</h1>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label pl-0">Naam</label>

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                @enderror
            </div>

            <div class="form-group row">
                <label for="tablenumber" class="col-md-4 col-form-label pl-0">Tafel nummer</label>

                <input id="tablenumber" type="number" class="form-control @error('tablenumber') is-invalid @enderror" name="tablenumber" value="{{ old('tablenumber') }}" required autocomplete="tablenumber" autofocus>

                @error('tablenumber')
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                @enderror
            </div>

            <div class="form-group row pt-4 pb-5 d-flex justify-content-center">
                <button class="btn btn-primary">Doorgaan</button>
            </div>

        </form>
    </div>


@endsection
