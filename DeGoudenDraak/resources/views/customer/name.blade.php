@extends('layouts.navbar')

@section('content')
    <div class="container">
        <form action="/homeorder" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row d-flex justify-content-center m-5">
                <h1>Vul de gegevens in</h1>
            </div>
            <div class="form-group row d-flex justify-content-center">
                <p><strong>(Bestellingen kunnen 1 uur na bestelling opgehaald worden!)</strong></p>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label pl-0">Voor- en achternaam</label>

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
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
