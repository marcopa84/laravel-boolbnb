@extends('layouts.layout')

@section('main')
<div class="dashboard">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="dashboard-header">
                    <h5 class="title">Dashboard</h5>
                    <p><i class="fas fa-user"></i> Ciao {{Auth::user()->name}}!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-6 col-md-3">
                <div class="dashboard-content">
                    <a class="area-link" href="#">
                        <div class="area">
                            <i class="icon-title fas fa-user fa-3x"></i>
                            <h6 class="title">Profilo</h6>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-3">
                <div class="dashboard-content">
                    <a class="area-link" href="{{route('registered.apartments.index')}}">
                        <div class="area">
                            <i class="icon-title fas fa-home fa-3x"></i>
                            <h6 class="title">Appartamenti</h6>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-3">
                <div class="dashboard-content">
                    <a class="area-link" href="#">
                        <div class="area">
                            <i class="icon-title fas fa-envelope fa-3x"></i>
                            <h6 class="title">Messaggi</h6>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-3">
                <div class="dashboard-content">
                    <a class="area-link" href="#">
                        <div class="area">
                            <i class="icon-title fas fa-bullhorn fa-3x"></i>
                            <h6 class="title">Inserzioni</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <img src="{{asset(Auth::user()->avatar)}}" alt="immagine del profilo" >
</div>
@endsection
