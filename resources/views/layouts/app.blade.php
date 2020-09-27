<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BreakOut') }}</title>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->
    <!-- bootstrap est importé dans app.scss et se charge avec npm run watch -->

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}" > <!-- FontAwesome -->

</head>
<body>
    <div id="app" class="app">
        <nav id="header" class="navbar navbar-expand-lg navbar-light breakout-navbar">
            <a class="navbar-brand" href="{{ url('/') }}">
                <div  id="header-logo" class="navbar-logo"></div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse navbar-left" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link nav-link-info nav-link-icones" href="#"><span class="nav-link-icones-span">Info</span><span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-home nav-link-icones" href="{{ url('/') }}"><span class="nav-link-icones-span">Accueil</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-room nav-link-icones" href="{{ url('/rooms') }}"><span class="nav-link-icones-span">Salles</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-forum nav-link-icones" href="{{ url('/forum') }}"><span class="nav-link-icones-span">Forum</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-shop nav-link-icones" href="{{ url('/shop') }}"><span class="nav-link-icones-span">Boutique</span></a>
                    </li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-parameters nav-link-icones dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="nav-link-icones-span">Paramètres</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('/account') }}">Mon compte</a>
                            <a class="dropdown-item" href="{{ url('/avatar') }}">Mon avatar</a>
                            <a class="dropdown-item" href="{{ url('/inventory') }}">Inventaire</a>
                            <a class="dropdown-item" href="{{ url('/myrooms') }}">Mes salles</a>
                        </div>
                    </li>
                    @endauth
                    <li class="nav-item pr-4 d-none-991">
                        <a class="nav-link nav-link-sound nav-link-icones" href=""></a>
                    </li>
                    <li class="nav-item navbar-button">
                        @guest
                            <button class="navbar-profile-button" data-toggle="modal" data-target="#modalconnexion">
                                <span>Se connecter</span>
                            </button>
                            <div class="modal fade" id="modalconnexion" tabindex="-1" aria-labelledby="modalconnexion" aria-hidden="true">
                                <div class="modal-dialog login-modal-dialog modal-dialog-centered">
                                    <div class="login-modal-content">
                                        <div class="login-modal-header">
                                            <div></div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1 !important;">
                                                <div aria-hidden="true" class="modal-cross"></div>
                                            </button>
                                        </div>
                                        <div class="login-modal-body">
                                            <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item onglet-modal-login margin-modal-login-left" role="presentation">
                                                    <a class="nav-link w-100 active" id="pills-connect-tab" data-toggle="pill" href="#pills-connect" role="tab" aria-controls="pills-connect" aria-selected="true">Se connecter</a>
                                                </li>
                                                <li class="nav-item onglet-modal-login margin-modal-login-right" role="presentation">
                                                    <a class="nav-link w-100" id="pills-register-tab" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">S'inscrire</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-connect" role="tabpanel" aria-labelledby="pills-connect-tab">
                                                    <div class="w-100 d-flex justify-content-between">
                                                        <div class="onglet-modal-login-body margin-modal-login-left" style="margin-top: 0 !important; margin-bottom: 10px !important;">
                                                        </div>
                                                        <div class="onglet-modal-login-body margin-modal-login-right" style="margin-top: 0 !important; margin-bottom: 10px !important;">
                                                            <div class="w-100 h-100 p-3">
                                                                <div class="d-flex justify-content-center">
                                                                    <img class="modal-login-logo" src="{{ asset('img/logos/BreakOut_Logotype_Citation.png') }}">
                                                                </div>
                                                                <form method="POST" action="{{ route('login')}}" class="mt-4">
                                                                    @csrf
                                                                    <label for="login-mail" class="modal-login-credentials-text">Nom d'utilisateur :</label>
                                                                    <input id="login-mail" class="input-login @error('email') is-invalid @enderror" type="email" placeholder="Votre email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                                        @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    <label for="login-password" class="modal-login-credentials-text mt-2">Mot de passe :</label>
                                                                    <div class="input-group">
                                                                        <input id="login-password  @error('password') is-invalid @enderror" type="password" class="form-control input-login-2" placeholder="Mot de passe" name="password" required autocomplete="current-password">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-outline-secondary input-login-btn" type="submit">GO</button>
                                                                        </div>
                                                                    </div>
                                                                        @error('password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    <div class="w-100 text-center mt-1">
                                                                        @if (Route::has('password.request'))
                                                                            <a class="small-text-login" href="{{ route('password.request') }}">
                                                                                <small>Mot de passe oublié ?</small>
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
                                                    <div class="w-100 d-flex justify-content-center">
                                                        <div class="onglet-modal-register-body">
                                                            <form method="POST" action="{{ route('register') }}">
                                                                @csrf
                                                                <div class="w-100 h-100 d-flex justify-content-between">
                                                                    <div class="margin-modal-login-left h-100" style="margin-top: 0 !important; margin-bottom: 10px !important;">
                                                                        <div class="w-100 h-100 p-3">
                                                                            <label for="login-mail" class="modal-login-credentials-text mt-1">Votre adresse email :</label>
                                                                            <input id="login-mail" class="input-login @error('email') is-invalid @enderror" type="email" placeholder="Votre email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                                            @error('email')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror

                                                                            <label for="name" class="modal-login-credentials-text mt-2">Votre nom d'utilisateur :</label>
                                                                            <input id="name" class="input-login @error('name') is-invalid @enderror" type="text" placeholder="Votre pseudo" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                                            @error('name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror

                                                                            <label for="password" class="modal-login-credentials-text mt-2">Votre mot de passe :</label>
                                                                            <input id="password" type="password" class="input-login @error('password') is-invalid @enderror" placeholder="Votre mot de passe" name="password" required autocomplete="new-password">

                                                                            @error('password')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror

                                                                            <label for="password-confirm" class="modal-login-credentials-text mt-2">Confirmation du mot de passe :</label>
                                                                            <input id="password-confirm" type="password" class="input-login" placeholder="Confirmer le mot de passe" name="password_confirmation" required autocomplete="new-password">

                                                                        </div>
                                                                    </div>
                                                                    <div class="margin-modal-login-right h-100" style="margin-top: 0 !important; margin-bottom: 10px !important;">
                                                                        <div class="w-100 h-100 p-3">
                                                                            <div class="d-flex justify-content-center">
                                                                                <img class="modal-login-logo" src="{{ asset('img/logos/BreakOut_Logotype_Citation.png') }}">
                                                                            </div>
                                                                            <div class="text-center">
                                                                                <label for="password-confirm" class="modal-login-credentials-text" style="margin-top: 42px;">Un code de parrainage :</label>
                                                                                <div class="w-100">
                                                                                    <div class="input-group mb-3 d-flex justify-content-center">
                                                                                        <div class="input-group-prepend btn-parrainage-prepend">
                                                                                            <span class="input-group-text" id="inputGroup-sizing-default"><img src="{{asset('img/icones/ajouter_un_ami.png')}}"></span>
                                                                                        </div>
                                                                                        <input type="text" class="btn-parrainage" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-check" style="margin-top: -6px;">
                                                                                    <input class="form-check-input" type="checkbox" value="" id="CheckConditions">
                                                                                    <label class="form-check-label" for="CheckConditions">
                                                                                        <small>J'ai bien lu et j'accepte les conditions générales</small>
                                                                                    </label>
                                                                                </div>
                                                                                <button type="submit" class="btn-submit-register" style="margin-top: 6px;">Envoyer</button>
                                                                                <div class="text-center" style="margin-top: 3px;">
                                                                                    <a href="" class="lien-conditions"><small>Conditions générales</small></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <button class="navbar-profile-button" data-toggle="modal" data-target="#modalprofil">
                                <span>Mon profil</span>
                            </button>
                            <div class="modal fade" id="modalprofil" tabindex="-1" aria-labelledby="modalprofil" aria-hidden="true">
                                <div class="modal-dialog login-modal-dialog modal-dialog-centered">
                                    <div class="login-modal-content">
                                        <div class="login-modal-header">
                                            <div class="josephin-bold color-white">{{ Auth::user()->name }} - Mon profil</div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1 !important;">
                                                <div aria-hidden="true" class="modal-cross"></div>
                                            </button>
                                        </div>
                                        <div class="login-modal-body">
                                            <div class="">{{ Auth::user()->name }} - Mon profil</div>

                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button class="btn-profile"><i class="fas fa-sign-out-alt"></i></button></a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endguest
                    </li>
                </ul>
            </div>
        </nav>
        <main class="">
            @yield('content-before')
            <div class="breakout-body">
                @yield('content')

                <footer>
                    <img class="img-fluid" src="{{ asset('img/Banque_graphique/Footer/footer_landscape_min.svg') }}">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="d-flex h-100">
                                <div class="d-flex flex-column text-center pt-2 pb-2 m-auto">
                                    <div><img class="img-fluid logo-footer" src="{{ asset('img/logos/BreakOut_Logotype_Blanc.png') }}"></div>
                                    <div class="texte-footer"><h6 class="josephin-bold">©Break Out 2020</h6></div>
                                    <div>
                                        <div class="d-flex justify-content-center">
                                            <div><a href="#" target="_blank"><button class="btn-twitter btn-footer"></button></a></div>
                                            <div><a href="#" target="_blank"><button class="btn-facebook btn-footer"></button></a></div>
                                            <div><a href="#" target="_blank"><button class="btn-instagram btn-footer"></button></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="d-flex h-100">
                                <div class="d-flex flex-column text-center pt-2 pb-2 m-auto">
                                    <div>
                                        <a href="#" class="texte-footer">Mentions légales</a><br>
                                        <a href="#" class="texte-footer">Utilisation des données personnelles</a><br>
                                        <a href="#" class="texte-footer">Support</a><br>
                                        <a href="#" class="texte-footer">Plan du site</a><br>
                                        <a href="#" class="texte-footer">Gemclicker</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="d-flex flex-column text-center pt-2 pb-2 h-100">
                                <small class="texte-footer m-auto p-4">
                                    Redécouvrez les escapes games avec BreakOut, un nouveau concept d'escape
                                    game en ligne. Nous vous proposons des scénarios complexes à jouer seul ou
                                    à plusieurs. Entrez dans la salle de votre choix et lancez-vous !
                                </small>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </main>
    </div>
<script>
    var scroll_position = 0;

    window.addEventListener('scroll',function(e){

        scroll_position = window.scrollY;
        //console.log(scroll_position)
        if (scroll_position >= 100) {
            if(!(document.getElementById('header').classList.contains("breakout-navbar-full")))
            {
                window.requestAnimationFrame(function() {
                    document.getElementById('header').classList.remove("breakout-navbar");
                    document.getElementById('header-logo').classList.remove("navbar-logo");

                    document.getElementById('header').classList.add("breakout-navbar-full");
                    document.getElementById('header-logo').classList.add("navbar-logo-full");
                });
            }
        } else
        {
            if(document.getElementById('header').classList.contains("breakout-navbar-full"))
            {
                window.requestAnimationFrame(function() {
                    document.getElementById('header').classList.remove("breakout-navbar-full");
                    document.getElementById('header-logo').classList.remove("navbar-logo-full");

                    document.getElementById('header-logo').classList.add("navbar-logo");
                    document.getElementById('header').classList.add("breakout-navbar");
                });
            }
        }
    })

    //Responsive
    if (document.body.clientWidth <= 991)
    {
        document.getElementById('header-logo').classList.add("d-none");
        //console.log(document.body.clientWidth);
    }
    window.onresize = function (){
        if (document.body.clientWidth <= 991)
        {
            document.getElementById('header-logo').classList.add("d-none");
            //console.log(document.body.clientWidth);
        } else {
            if (document.getElementById('header-logo').classList.contains("d-none")) {
                document.getElementById('header-logo').classList.remove("d-none");
            }
        }
    }

</script>
</body>
</html>
