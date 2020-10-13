<?php
    $titles = [
        "index.php" => "Page d'accueil"
    ]
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BreakOut') }}</title>
    <!--<title> echo $titles[$_SERVER['PHP_SELF']] ?></title>-->
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
        @yield('app')
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


    // Authentification
    var BASE_URL = '{{ URL::to('/') }}';

</script>
</body>
</html>
