<!-- appLanding -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> @yield('title') </title>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Sunrise.Digital">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('landing/assets/favicon.png')}}">

    <!-- Bootstrap -->
    <link href="{{asset('landing/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/ionicons-2.0.1/css/ionicons.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Catamaran:400,100,300' rel='stylesheet' type='text/css'>

@yield('styles')

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"> <i class="ion-cube"></i> Unistore</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="@yield('activeHome')"><a href="#">Inicio</a></li>
                <li class="@yield('activeShop')"><a href="{{ route('landing.catalog') }}">Catálogo</a></li>
                <li class="@yield('activeCategories')"><a href="#">Categorías</a></li>
                @auth()
                    <li class="@yield('activeOrders')"><a href="#">Pedidos</a></li>
                    <li class="@yield('activeAddress')"><a href="#">Direcciones</a></li>
                @endauth
                <li class="@yield('activeContact')"><a href="#">Contacto</a></li>
            </ul>
            @guest
                <ul class="nav navbar-nav navbar-right">
                    <li class="@yield('activeLogin')"><a href="{{ route('login') }}"> <i class="ion-android-person"></i> Iniciar sesión </a></li>
                    <li class="@yield('activeRegister')"><a href="{{ route('register') }}"> Registro</a></li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"> {{ Auth::user()->name }} </a></li>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i>
                            {{ __('Cerrar Sesión') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @can('access_dashboard')
                    <li>
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                    @endcan
                </ul>
            @endguest
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>
<hr class="offset-md">
<!-- NAVBAR -->

<!-- HEADER PAGE -->
<div class="box">
    <div class="container">
        <h1>@yield('header-page')</h1>
    </div>
</div>
<hr class="offset-md">
<!-- HEADER PAGE -->

<!-- CONTENT PAGE -->
<div id="app" class="container">
    <div class="row">
        @yield('content')
    </div>
</div>
<br><br>
<br class="hidden-xs">
<br class="hidden-xs">
<!-- CONTENT PAGE -->

<!-- FOOTER PAGE -->
<footer>
    <div class="about">
        <div class="container">
            <div class="row">
                <hr class="offset-md">

                <div class="col-xs-6 col-sm-3">
                    <div class="item">
                        <i class="ion-ios-telephone-outline"></i>
                        <h1>24/7 free <br> <span>support</span></h1>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="item">
                        <i class="ion-ios-star-outline"></i>
                        <h1>Low price <br> <span>guarantee</span></h1>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="item">
                        <i class="ion-ios-gear-outline"></i>
                        <h1> Manufacturer’s <br> <span>warranty</span></h1>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="item">
                        <i class="ion-ios-loop"></i>
                        <h1> Full refund <br> <span>guarantee</span> </h1>
                    </div>
                </div>

                <hr class="offset-md">
            </div>
        </div>
    </div>

    <div class="subscribe">
        <div class="container align-center">
            <hr class="offset-md">

            <h1 class="h3 upp">Join our newsletter</h1>
            <p>Get more information and receive special discounts for our products.</p>
            <hr class="offset-sm">

            <form action="#" method="post">
                <div class="input-group">
                    <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control">
                    <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary"> Subscribe <i class="ion-android-send"></i> </button>
                </span>
                </div><!-- /input-group -->
            </form>
            <hr class="offset-lg">
            <hr class="offset-md">

            <div class="social">
                <a href="#"><i class="ion-social-facebook"></i></a>
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-googleplus-outline"></i></a>
                <a href="#"><i class="ion-social-instagram-outline"></i></a>
                <a href="#"><i class="ion-social-linkedin-outline"></i></a>
                <a href="#"><i class="ion-social-youtube-outline"></i></a>
            </div>


            <hr class="offset-md">
            <hr class="offset-md">
        </div>
    </div>


    <div class="container">
        <hr class="offset-md">

        <div class="row menu">
            <div class="col-sm-3 col-md-2">
                <h1 class="h4">Information <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i> </h1>

                <div class="list-group">
                    <a href="#" class="list-group-item">About</a>
                    <a href="#" class="list-group-item">Terms</a>
                    <a href="#" class="list-group-item">How to order</a>
                    <a href="#" class="list-group-item">Delivery</a>
                </div>
            </div>
            <div class="col-sm-3 col-md-2">
                <h1 class="h4">Products <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i> </h1>

                <div class="list-group">
                    <a href="#" class="list-group-item">Laptops</a>
                    <a href="#" class="list-group-item">Tablets</a>
                    <a href="#" class="list-group-item">Servers</a>
                </div>
            </div>
            <div class="col-sm-3 col-md-2">
                <h1 class="h4">Support <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i> </h1>

                <div class="list-group">
                    <a href="#" class="list-group-item">Returns</a>
                    <a href="#" class="list-group-item">FAQ</a>
                    <a href="#" class="list-group-item">Contacts</a>
                </div>
            </div>
            <div class="col-sm-3 col-md-2">
                <h1 class="h4">Location</h1>

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Language
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#English"> <img src="{{ asset('landing/assets/img/flags/gb.png') }}" alt="Eng"/> English</a></li>
                        <li><a href="#Spanish"> <img src="{{ asset('landing/assets/img/flags/es.png') }}" alt="Spa"/> Spanish</a></li>
                        <li><a href="#Deutch"> <img src="{{ asset('landing/assets/img/flags/de.png') }}" alt="De"/> Deutch</a></li>
                        <li><a href="#French"> <img src="{{ asset('landing/assets/img/flags/fr.png') }}" alt="Fr"/> French</a></li>
                    </ul>
                </div>
                <hr class="offset-xs">

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Currency
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><a href="#Euro"><i class="ion-social-euro"></i> Euro</a></li>
                        <li><a href="#Dollar"><i class="ion-social-usd"></i> Dollar</a></li>
                        <li><a href="#Yen"><i class="ion-social-yen"></i> Yen</a></li>
                        <li><a href="#Bitcoin"><i class="ion-social-bitcoin"></i> Bitcoin</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-sm-3 col-md-3 col-md-offset-1 align-right hidden-sm hidden-xs">
                <h1 class="h4">Unistore, Inc.</h1>

                <address>
                    1305 Market Street, Suite 800<br>
                    San Francisco, CA 94102<br>
                    <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>

                <address>
                    <strong>Support</strong><br>
                    <a href="mailto:#">sup@example.com</a>
                </address>

            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-9 payments">
                <p>Pay your order in the most convenient way</p>

                <div class="payment-icons">
                    <img src="{{ asset('landing/assets/img/payments/paypal.svg') }}" alt="paypal">
                    <img src="{{ asset('landing/assets/img/payments/visa.svg') }}" alt="visa">
                    <img src="{{ asset('landing/assets/img/payments/master-card.svg') }}" alt="mc">
                    <img src="{{ asset('landing/assets/img/payments/discover.svg') }}" alt="discover">
                    <img src="{{ asset('landing/assets/img/payments/american-express.svg') }}" alt="ae">
                </div>
                <br>

            </div>
            <div class="col-sm-4 col-md-3 align-right align-center-xs">
                <hr class="offset-sm hidden-sm">
                <hr class="offset-sm">
                <p>Unistore Pro © 2016 <br> Designed By <a href="http://sunrise.ru.com/" target="_blank">Sunrise Digital</a></p>
                <hr class="offset-lg visible-xs">
            </div>
        </div>
    </div>
</footer>
<!-- FOOTER PAGE -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('landing/assets/js/jquery-latest.min.js')}}"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('landing/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('landing/assets/js/core.js')}}"></script>
<script src="{{asset('landing/assets/js/catalog.js')}}"></script>

<script type="text/javascript" src="{{asset('landing/assets/js/jquery-ui-1.11.4.js')}}"></script>
<script type="text/javascript" src="{{asset('landing/assets/js/jquery.ui.touch-punch.js')}}"></script>

@yield('scripts')

</body>
</html>