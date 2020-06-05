@extends('layouts.site')

@section('content')
    <div class="row d-flex justify-content-center">
        <h1>Als u het menu wilt downloaden klik dan op de onderstaande link</h1>
    </div>
    <div class="row d-flex justify-content-center m-5">
        <div class="d-flex justify-content-center">
            <a href="/pdf">
                <button class="btn btn-primary" style="height: 100px; width: 200px; max-height: 100px; max-width: 200px;">
                    Downloaden
                </button>
            </a>
        </div>
    </div>
    <hr>
    <img width="100%" src="pictures\restaurant-menukaart-1-2.jpg">
    <img width="100%" src="pictures\restaurant-menukaart-1.jpg">
@endsection
