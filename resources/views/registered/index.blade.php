@extends('layouts.layout')

@section('main')
<div class="dashboard mt-5">
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
            <div class="col-12 col-sm-12 col-md-4">
                <div class="dashboard-content">
                    <a class="area-link" href="{{route('registered.apartments.index')}}">
                        <div class="area">
                            <i class="icon-title fas fa-home fa-3x"></i>
                            <p class="title">Appartamenti</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="dashboard-content">
                    <a class="area-link" href="{{route('registered.messages')}}">
                        <div class="area">
                            <i class="icon-title fas fa-envelope fa-3x"></i>
                            <p class="title">Messaggi</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="dashboard-content">
                    <a class="area-link" href="{{route('registered.ads.index')}}">
                        <div class="area">
                            <i class="icon-title fas fa-bullhorn fa-3x"></i>
                            <p class="title">Sponsorizzazioni</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
