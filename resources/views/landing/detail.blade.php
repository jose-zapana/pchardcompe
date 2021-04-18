@extends('layouts.appLanding')

@section('activeShop')
    active
@endsection

@section('styles')
    <link href="{{ asset('landing/assets/css/carousel.css') }}" rel="stylesheet">
    <style>
        .altura {
            height: 450px !important;
        }
        .alturaProduct {
            height: 500px !important;
            width: 500px;
        }
    </style>

@endsection

@section('title')
    Unistore | Producto
@endsection

@section('content')
    <div class="product">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-7">
                    <div class="carousel product" data-count="1" data-current="1">
                        <!-- <button class="btn btn-control"></button> -->

                        <div class="items">
                            @foreach( $product->images as $image )
                            <div class="item active" data-marker="{{$image->id}}">
                                <img src="{{asset('images/product/'.$image->image)}}" alt="{{ $image->alt }}" class="alturaProduct"/>
                            </div>
                            @endforeach
                        </div>

                        <ul class="markers">
                            @foreach( $product->images as $image )
                            <li data-marker="{{$image->id}}" class="active"><img src="{{asset('images/product/'.$image->image)}}" alt="{{ $image->alt }}"/></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5 col-md-5">
                    {{--<img src="{{ asset('images/product/'.$product->images[0]->image) }}" alt="HP" class="brand hidden-xs" />--}}
                    <h1>{{ $product->name }}</h1>

                    <p> &middot; Chrome OS™</p>
                    <p> &middot; Intel® Celeron® processor</p>
                    <p> &middot; Intel HD Graphics</p>

                    <p class="price">S/. {{ $product->unit_price }}</p>
                    <br><br>

                    <button class="btn btn-primary btn-rounded"> <i class="ion-bag"></i> Add to cart</button>
                </div>
            </div>
            <br><br><br>


            <div class="row">
                <div class="col-sm-7">
                    <h1>{{ $product->name }}</h1>
                    <br>

                    <p>
                        {{ $product->description }}
                    </p>
                    <br>

                    <h2>Especificaciones del producto</h2>
                    <br>
                    @foreach( $product->infos as $info )
                    <div class="row specification">
                        <div class="col-sm-6"> <label>{{$info->specification}}</label> </div>
                        <div class="col-sm-6"> <p>{{$info->content}}</p> </div>
                    </div>
                    @endforeach
                </div>

                <div class="col-sm-5">
                    <div class="comments">
                        <h2 class="h3">What do you think? (#3)</h2>
                        <br>


                        <div class="wrapper">
                            <div class="content">
                                <h3>Anne Hathaway</h3>
                                <label>2 years ago</label>
                                <p>
                                    Apple Music brings iTunes music streaming to the UK. But is it worth paying for? In our Apple Music review, we examine the service's features, UK pricing, audio quality and music library
                                </p>


                                <h3>Chris Hemsworth</h3>
                                <label>Today</label>
                                <p>
                                    Samsung's Galaxy S7 smartphone is getting serious hype. Here's what it does better than Apple's iPhone 6s.
                                </p>


                                <h3>Anne Hathaway</h3>
                                <label>2 years ago</label>
                                <p>
                                    Apple Music brings iTunes music streaming to the UK. But is it worth paying for? In our Apple Music review, we examine the service's features, UK pricing, audio quality and music library
                                </p>
                            </div>
                        </div>
                        <br>

                        <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#Modal-Comment"> <i class="ion-chatbox-working"></i> Add comment </button>
                    </div>
                    <br><br>

                    <div class="talk">
                        <h2 class="h3">Do you have any questions?</h2>
                        <p>Online chat with our manager</p>

                        <button class="btn btn-default btn-sm"> <i class="ion-android-contact"></i> Lat's talk </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection

@section('scripts')

@endsection
