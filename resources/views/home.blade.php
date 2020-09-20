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
    <div class="container mt-3">
        <div class="d-flex justify-content-between">
            <div class="panneau-accueil"><h3>Nos dernières salles</h3></div>
            <div class="d-none-991">5 parties en cours</div>
        </div>
        <div class="row pb-5 mb-5">
            <div class="col-md-4 col-12 mt-3 text-center">
                <div class="carre-salle-accueil" style="background: url({{ asset('img/illustrations_salles/exemple1.jpg') }})">
                    <div class="carre-salle-accueil-apres">
                        <div class="d-flex flex-column w-100">
                            <div class="w-100 d-flex" style="height: calc(100% - 60px);">
                                <div class="m-auto">
                                    <h2>Le tombeau<br> d'agamemnon</h2>
                                </div>
                            </div>
                            <div class="w-100" style="height: 60px;">
                                <div class="h-100">
                                    <a href=""><button>Jouer</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carre-salle-accueil-footer p-2">
                    <div class="d-flex justify-content-between">
                        <div><i class="fas fa-user">&nbsp;</i><i class="fas fa-user"></i>&nbsp;<i class="fas fa-user"></i></div>
                        <div><i class="fas fa-hourglass-half"></i><small> ≃ 30 min</small></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 mt-3 text-center">
                <div class="carre-salle-accueil" style="background: url({{ asset('img/illustrations_salles/exemple2.png') }})">
                    <div class="carre-salle-accueil-apres">
                        <div class="d-flex flex-column w-100">
                            <div class="w-100 d-flex" style="height: calc(100% - 60px);">
                                <div class="m-auto">
                                    <h2>Le tombeau<br> d'agamemnon</h2>
                                </div>
                            </div>
                            <div class="w-100" style="height: 60px;">
                                <div class="h-100">
                                    <a href=""><button>Jouer</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carre-salle-accueil-footer p-2">
                    <div class="d-flex justify-content-between">
                        <div><i class="fas fa-user">&nbsp;</i><i class="fas fa-user"></i>&nbsp;<i class="fas fa-user"></i></div>
                        <div><i class="fas fa-hourglass-half"></i><small> ≃ 30 min</small></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 mt-3 text-center">
                <div class="carre-salle-accueil" style="background: url({{ asset('img/illustrations_salles/exemple3.png') }})">
                    <div class="carre-salle-accueil-apres">
                        <div class="d-flex flex-column w-100">
                            <div class="w-100 d-flex" style="height: calc(100% - 60px);">
                                <div class="m-auto">
                                    <h2>Le tombeau<br> d'agamemnon</h2>
                                </div>
                            </div>
                            <div class="w-100" style="height: 60px;">
                                <div class="h-100">
                                    <a href=""><button>Jouer</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carre-salle-accueil-footer p-2">
                    <div class="d-flex justify-content-between">
                        <div><i class="fas fa-user">&nbsp;</i><i class="fas fa-user"></i>&nbsp;<i class="fas fa-user"></i></div>
                        <div><i class="fas fa-hourglass-half"></i><small> ≃ 30 min</small></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
