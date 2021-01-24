@extends('layouts.appLanding')

@section('activeRegister')
    active
@endsection

@section('title')
    Unistore | Registro
@endsection

@section('content')
    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 md-padding">
        <h1 class="align-center">Nueva cuenta</h1>
        <br>

        <form class="join" action="{{ route('register') }}" method="post">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <input id="name" type="text" placeholder="Nombre completo" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus><br>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-sm-12">
                        <input id="dni" type="text" placeholder="Documento de Identidad" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni" ><br>

                        @error('dni')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-12">
                        <input id="email" type="email" placeholder="Correo Electrónico" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"><br>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-12">
                        <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"><br>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-12">
                        <input id="password-confirm" type="password" placeholder="Confirmar contraseña" class="form-control" name="password_confirmation" required autocomplete="new-password"><br>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Registrarse</button>
            <a href="#" class="xs-margin">Terms ></a>

            <br><br>
            <p>
                By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.
            </p>
        </form>

        <br class="hidden-sm hidden-md hidden-lg">
    </div>
@endsection
