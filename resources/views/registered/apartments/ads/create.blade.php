@php
    use Carbon\Carbon;
@endphp
@extends('layouts.layout')
@section('main')
<div class="container my-5">
    <form action="{{route('registered.ads.store_cart', $apartment->id)}}" method="post">
        @csrf
        @method('POST')
        <h3>Stai sponsorizzando l'annuncio riguardante {{$apartment->title}} - {{$apartment->address}}</h3>
        @if($errors->has('apartment_id'))
                <div class="error alert alert-danger">{{ $errors->first('apartment_id') }}</div>
        @endif
        <div class="form-group">
            <label for="ad_id">Scegli la durata della sponsorizzazione</label>
            <select name="ad_id" class="form-control">
                @foreach ($ads as $ad)
                    <option value="{{$ad->id}}"> Tipo Sponsorizzazione: {{$ad->hours}} ore - € {{$ad->price}} </option>
                @endforeach
            </select>
            @if($errors->has('ad_id'))
                <div class="error alert alert-danger">{{ $errors->first('ad_id') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="start_date">Imposta la data e l'orario di avvio della sponsorizzazione</label>
            <input type="datetime-local" name="start_date" class="form-control" value="{{Carbon::now()->addMinute(5)->format('Y-m-d\\TH:i')}}">
            @if($errors->has('start_date'))
                <div class="error alert alert-danger">{{ $errors->first('start_date') }}</div>
            @endif
        </div>
        <button class="btn btn-dark" type="submit">Ordina sponsorizzazione</button>
    </form>
</div>
@endsection
