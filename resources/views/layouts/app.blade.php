<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BreakOut') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous" defer></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light breakout-navbar">
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="navbar-logo"></div>
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
                            <a class="dropdown-item" href="#">Mon compte</a>
                            <a class="dropdown-item" href="#">Mon avatar</a>
                            <a class="dropdown-item" href="#">Inventaire</a>
                            <a class="dropdown-item" href="#">Mes salles</a>
                        </div>
                    </li>
                    @endauth
                    <li class="nav-item pr-4">
                        <a class="nav-link nav-link-sound nav-link-icones" href=""></a>
                    </li>
                    <li class="nav-item navbar-button">
                        <button class="navbar-profile-button">
                            <span>Mon profil</span>
                        </button>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
