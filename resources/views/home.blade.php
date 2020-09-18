@extends('layouts.app')

@section('content')
<div class="breakout-bakground"></div>
<div id="carousel">
    <carousel>
        <carousel-slide>
            <div style="position: absolute; left: 0; right: 0; text-align: center; top: 50%; color: white;"></div>
            <img src="{{ asset('img/Carousel_images/test.png') }}" width="100%">
        </carousel-slide>
        <carousel-slide>
            <div style="position: absolute; left: 0; right: 0; text-align: center; top: 50%; color: white;"></div>
            <img src="{{ asset('img/Carousel_images/test.png') }}" width="100%">
        </carousel-slide>
        <carousel-slide>
            <div style="position: absolute; left: 0; right: 0; text-align: center; top: 50%; color: white;"></div>
            <img src="{{ asset('img/Carousel_images/test.png') }}" width="100%">
        </carousel-slide>
    </carousel>
</div>
<div class="breakout-body-before">
    texte
</div>
<div class="breakout-body">
    <hr class="liseret-rouge">
    <div class="d-flex justify-content-center">
        <button class="btn-home-play">Jouer</button>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
