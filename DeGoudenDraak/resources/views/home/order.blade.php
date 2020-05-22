@extends('layouts.site')


@section('content')

    <div class="row d-flex justify-content-center">
        <h1>Bestellen als</h1>
    </div>
        <div class="row d-flex justify-content-center m-5">
            <div class="col-sm-6 d-flex justify-content-center" style="border-right: black 1px solid">
                @guest
                    <a href="/login">
                        <button class="btn btn-primary" style="height: 100px; width: 200px; max-height: 100px; max-width: 200px;">
                            Medewerker
                        </button>
                    </a>
                @else
                    <a href="/cashregister/index">
                        <button class="btn btn-primary" style="height: 100px; width: 200px; max-height: 100px; max-width: 200px;">
                            Medewerker
                        </button>
                    </a>
                @endguest
            </div>
            <div class="col-sm-6 d-flex justify-content-center">
                <a href="/tablenumber">
                    <button class="btn btn-primary" style="height: 100px; width: 200px; max-height: 100px; max-width: 200px;">
                        Klant
                    </button>
                </a>
            </div>
        </div>
@endsection

