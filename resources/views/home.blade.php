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
        <div class="row pb-5">
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
        <div class="row pb-5">
            <div class="col-12">
                <div class="cadre-explications p-3">
                    <div class="d-flex justify-content-center">
                        <div class="cadre-explications-panneau">
                            <h1>BreakOut : L’escape game 100% virtuel</h1>
                        </div>
                    </div>
                    <p>Vous avez l’âme d’un enquêteur et êtes à l’affut du moindre indice ?
                        Alors mettez vos acquittées à l’épreuve ! <span class="josephin-bold-italic" style="color: #B3000F !important;">Choisissez une salle de jeu
                            et relevez des énigmes</span> qui sauront mettre tous vos sens à l’épreuve !
                    </p>
                    <div class="sous-cadre-explications">
                        <div class="row">
                            <div class="col-12">
                                <h3>Vous devrez faire preuve</h3>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="d-flex flex-column text-center icones-explications-accueil">
                                    <div class="w-100 d-flex justify-content-center">
                                        <div><img src="{{ asset('/img/icones/brain.png') }}" height="60px" width="60px"></div>
                                    </div>
                                    <div class="w-100 d-flex justify-content-center text-center">
                                        <div><p>D'un esprit logique</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="d-flex flex-column text-center icones-explications-accueil">
                                    <div class="w-100 d-flex justify-content-center">
                                        <div><img src="{{ asset('/img/icones/vision.png') }}" height="60px" width="60px"></div>
                                    </div>
                                    <div class="w-100 d-flex justify-content-center text-center">
                                        <div><p>D'une vue à tout épreuve</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="d-flex flex-column text-center icones-explications-accueil">
                                    <div class="w-100 d-flex justify-content-center">
                                        <div><img src="{{ asset('/img/icones/ear.png') }}" height="60px" width="60px"></div>
                                    </div>
                                    <div class="w-100 d-flex justify-content-center text-center">
                                        <div><p>D'une oreille attentive</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="d-flex flex-column text-center icones-explications-accueil">
                                    <div class="w-100 d-flex justify-content-center">
                                        <div><img src="{{ asset('/img/icones/curious.png') }}" height="60px" width="60px"></div>
                                    </div>
                                    <div class="w-100 d-flex justify-content-center text-center">
                                        <div><p>De beaucoup de curiosité</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12 col-md-6">
                <div class="panneau-ligne-1 pb-3 padding-991">
                    <hr>
                    <div class="d-flex justify-content-center">
                        <div><h2>Top 3 joueurs</h2></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="cadre-top-joueurs" style="margin-top: 50px;">
                            <div class="d-flex justify-content-center">
                                <div class="top-medal-joueurs">
                                    <img src="{{ asset('/img/icones/medal_silver.png') }}">
                                </div>
                            </div>
                            <div class="cadre-top-joueurs-header">

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="cadre-top-joueurs cadre-top-joueurs-middle" style="height: 300px;">
                            <div class="d-flex justify-content-center">
                                <div class="top-medal-joueurs-middle">
                                    <img src="{{ asset('/img/icones/medal_gold.png') }}">
                                </div>
                            </div>
                            <div class="cadre-top-joueurs-header-middle">

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="cadre-top-joueurs" style="margin-top: 50px;">
                            <div class="d-flex justify-content-center">
                                <div class="top-medal-joueurs">
                                    <img src="{{ asset('/img/icones/medal_bronze.png') }}">
                                </div>
                            </div>
                            <div class="cadre-top-joueurs-header">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 pb-5">
                <div class="panneau-ligne-1">
                    <hr>
                    <div class="d-flex justify-content-center">
                        <div><h2>Top 3 salles</h2></div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
