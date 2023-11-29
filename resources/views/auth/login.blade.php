@extends('layouts.appLanding2')

@section('activeLogin')
    active
@endsection

@section('title')
    Pc-Hard | Accede a tu cuenta
@endsection

@section('content')
    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 md-padding">
        <h1 class="align-center">Accede a tu cuenta</h1>
        <br>

        <form class="signin" action="{{ route('login') }}" method="post">
            @csrf
            <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" placeholder="Documento de Identidad" value="{{ old('dni') }}" required autocomplete="dni" autofocus>
            @error('dni')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>

            <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>

            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Recuérdame') }}
            </label>

            <br>

            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            @if (Route::has('password.request'))
                <a href="#forgin-password" data-action="Forgot-Password" class="xs-margin">Recuperación de contraseña ></a>
            @endif
            <br><br>

            <p>
                Si ya tiene una cuenta con nosotros, inicie sesión.
            </p>
            <hr class="offset-xs">

            <!-- <a href="{{ route('social.auth', 'facebook') }}" class="btn btn-facebook"> <i class="ion-social-facebook"></i> Login with Facebook </a>
            <hr class="offset-sm">

            <a href="{{ route('social.auth', 'github') }}" class="btn btn-success btn-block"> <i class="ion-social-github"></i> Login with Github </a>
            <hr class="offset-sm">

            <a href="{{ route('social.auth', 'twitter') }}" class="btn btn-info btn-block"> <i class="ion-social-twitter"></i> Login with Twitter </a>
            <hr class="offset-sm">

            <a href="{{ route('social.auth', 'google') }}" class="btn btn-danger btn-block"> <i class="ion-social-google"></i> Login with Google </a>
            <hr class="offset-sm"> -->

            <p>
                No tienes una cuenta? Crear una ahora! <a href="{{ route('register') }}"> Crea cuenta > </a>
            </p>

        </form>
    </div>
@endsection
