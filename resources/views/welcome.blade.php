<!-- Welcome -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Pc Hard | Pchard SAC </title>

    <meta name="description" content="Pchard SAC es una empresa peruana que brinda servicios de soporte técnico y venta de ordenadores y laptops">
    <meta name="keywords" content="pchard, pc hard, pchard sac, soporte tecnico, venta de computadoras, soporte tecnico a domicilio, reparacion, accesorios de computo, suministros, impresoras">
    <meta name="author" content="José Zapana">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('landing/assets/favicon.png')}}">

    <!-- Bootstrap -->
    <link href="{{asset('landing/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/css/carousel.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/css/carousel-recommendation.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/ionicons-2.0.1/css/ionicons.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Catamaran:400,100,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"> <i class="ion-cube"></i> Pc-Hard</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ route('landing.catalog') }}">Catálogo</a></li>
                <li><a href="#">Categorías</a></li>
                @auth()
                    <li><a href="#">Pedidos</a></li>
                    <li><a href="#">Direcciones</a></li>
                @endauth
                <li><a href="{{ route('show.contact') }}">Contacto</a></li>
            </ul>
            @guest
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{ route('login') }}"> <i class="ion-android-person"></i> Iniciar Sesión </a></li>
                    <li><a href="{{ route('register') }}"> Registro</a></li>
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
                    <!-- Este link nos regresa al home (parte interna del sistema) -->
                    <li><a href="{{ route('home') }}">
                            Mi cuenta
                        </a></li>
                </ul>
            @endguest
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>


<header>
    <div class="carousel" data-count="3" data-current="2">
        <!-- <button class="btn btn-control"></button> -->

        <div class="items">
            <div class="item" data-marker="1">
                <img src="{{asset('landing/assets/img/carousel/bckg.jpg')}}" alt="Background" class="background"/>

                <div class="content">
                    <div class="outside-content">
                        <div class="inside-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 align-center">
                                        <h1>New amazing laptops</h1>
                                        <p>Provide lightweight and powerull</p>
                                        <a href="#">More laptops ></a>
                                        <br><br>
                                    </div>
                                    <div class="col-sm-6 col-sm-offset-3 align-center">
                                        <img src="{{asset('landing/assets/img/carousel/newlaptops.jpg')}}" alt="Laptops"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item active" data-marker="2">
                <img src="{{asset('landing/assets/img/carousel/bckg.jpg')}}" alt="Background" class="background"/>

                <div class="content">
                    <div class="outside-content">
                        <div class="inside-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2 align-center">
                                        <img src="{{asset('landing/assets/img/carousel/surfaces.jpg')}}" alt="Surface Pro"/>
                                    </div>
                                    <div class="col-sm-12 align-center">
                                        <h1>8 Windows Hybrid Laptops</h1>
                                        <p>The laptop comes with an Intel i5 chip and 8GB of RAM.</p>
                                        <a href="#">View surfaces ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" data-marker="3">
                <img src="{{asset('landing/assets/img/carousel/bckg.jpg')}}" alt="Background" class="background"/>

                <div class="content">
                    <div class="outside-content">
                        <div class="inside-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-5 col-sm-offset-1 align-center">
                                        <img src="{{asset('landing/assets/img/carousel/ipadair2.jpg')}}" alt="iPad Air 2" class="hidden-xs hidden-sm"/>
                                        <img src="{{asset('landing/assets/img/carousel/ipadair2m.jpg')}}" alt="iPad Air 2" class="hidden-md hidden-lg"/>
                                    </div>
                                    <div class="col-sm-4 align-left">
                                        <br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm">
                                        <br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm">
                                        <h1>Luxury devices</h1>
                                        <br>

                                        <p>
                                            Luxury watches, business tablets and 3D touch: How Apple plans to stay ahead in mobile.
                                            When it comes to the brand’s latest iPhones, the biggest excitement isn’t focused on the addition of a rose gold coloured device but the new 3D touch sensors.
                                        </p>
                                        <a href="#">View article ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="markers">
            <li data-marker="1"><img src="{{asset('landing/assets/img/carousel/newlaptops.jpg')}}" alt="Background"/></li>
            <li data-marker="2" class="active"><img src="{{asset('landing/assets/img/carousel/surfaces.jpg')}}" alt="Background"/></li>
            <li data-marker="3"><img src="{{asset('landing/assets/img/carousel/ipadair2.jpg')}}" alt="Background"/></li>
        </ul>
    </div>
</header>
<br><br>

<div class="container">
    <div class="row">
        <div class="col-sm-3 align-center">
            <a href="#">
                <img src="{{ asset('landing/assets/img/tiles/blog.jpg') }}" alt="Blog" class="image"/>
            </a>
            <br><br>

            <a href="#">Blog headlines</a>
        </div>
        <div class="col-sm-3 align-center">
            <a href="#video" data-gallery="#video" data-source="vimeo" data-id="110691368" data-id="110691368" data-title="Apple iPad Air" data-description="So capable, you won’t want to put it down. So thin and light, you won’t have to.">
                <img src="{{ asset('landing/assets/img/tiles/video-apple.jpg') }}" alt="New devices" class="image"/>
            </a>
            <br><br>

            <a href="#video" data-gallery="#video" data-source="vimeo" data-id="110691368" data-title="Apple iPad Air" data-description="So capable, you won’t want to put it down. So thin and light, you won’t have to.">New apple diveces</a>
        </div>
        <div class="col-sm-3 align-center">
            <a href="#video" data-gallery="#video" data-source="youtube" data-id="6g-ZIm0wge4" data-title="Best New Dell Laptops" data-description="Best of dell's laptops that you can consider buying in 2016. 4 Laptops are featured in the video and all of them has equal importance and there is no order that #1 is better than #2">
                <img src="{{ asset('landing/assets/img/tiles/video-dell.jpg') }}" alt="Del XPS" class="image"/>
            </a>
            <br><br>

            <a href="#video" data-gallery="#video" data-source="youtube" data-id="6g-ZIm0wge4" data-title="Best New Dell Laptops" data-description="Best of dell's laptops that you can consider buying in 2016. 4 Laptops are featured in the video and all of them has equal importance and there is no order that #1 is better than #2">Brend new DELL XPS</a>
        </div>
        <div class="col-sm-3 align-center">
            <a href="#">
                <img src="{{ asset('landing/assets/img/tiles/gallery.jpg') }}" alt="Gallery" class="image"/>
            </a>
            <br><br>

            <a href="#">Products gallery</a>
        </div>
    </div>
</div>
<br><br>

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
                <h1 class="h4">PcHard S.A.C.</h1>

                <address>
                    Lima<br>
                    Perú<br>
                    <abbr title="Phone">P:</abbr> (51) 957686487
                </address>

                <address>
                    <strong>Support</strong><br>
                    <a href="mailto:#">contac@pc-hard.com</a>
                </address>

            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-9 payments">
                <p>Paga tu pedido de la forma más cómoda</p>

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
                <p>pc-hard.com © 2023 <br> Designed By <a href="https://www.pc-hard.com/" target="_blank">PcHard SAC</a></p>
                <hr class="offset-lg visible-xs">
            </div>
        </div>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="Modal-ForgotPassword" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i></span></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="modal-title">¿Olvidaste tu contraseña?</h4> 
                            <br>

                            <form class="join" action="#" method="post">
                                <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control" />
                                <br>

                                <button type="submit" class="btn btn-primary btn-sm">Continue</button>
                                <a href="#Sign-In" data-action="Sign-In">Back ></a>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <br><br>
                            <p>
                                Ingrese la dirección de correo electrónico asociada con su cuenta. Haga clic en enviar para recibir su contraseña por correo electrónico.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modal-Gallery" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i></span></button>
                <h4 class="modal-title">Title</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('landing/assets/js/jquery-latest.min.js') }}"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('landing/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('landing/assets/js/core.js') }}"></script>
<script src="{{ asset('landing/assets/js/carousel.js') }}"></script>
<script src="{{ asset('landing/assets/js/carousel-recommendation.js') }}"></script>

</body>
</html>