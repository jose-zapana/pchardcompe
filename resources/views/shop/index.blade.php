@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModShop')
    open
@endsection

@section('activeListShop')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li class="active">Listado de Tiendas</li>
        </ul><!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
            </form>
        </div><!-- /.nav-search -->
    </div>
@endsection

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Dirección</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $shops as $shop )
        <tr>
            <th scope="row">{{ $shop->id }}</th>
            <td>{{ $shop->name }}</td>
            <td>{{ $shop->address }}</td>
            <td>{{ $shop->phone }}</td>
            <td>
                <a href="#" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')

@endsection