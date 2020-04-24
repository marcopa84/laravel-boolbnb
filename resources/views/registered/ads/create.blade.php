@php
    use Carbon\Carbon;
@endphp
@extends('layouts.layout')
@section('main')
<div class="container my-5">
    <form action="{{route('registered.ads.store')}}" method="post">
        @csrf
        @method('POST')
        <h3>Stai sponsorizzando l'annuncio riguardante {{$apartment->title}}</h3>
        @if($errors->has('apartment_id'))
                <div class="error alert alert-danger">{{ $errors->first('apartment_id') }}</div>
        @endif
        <div class="form-group">
            <label for="ad_id">Scegli la durata della sponsorizzazione</label>
            <select name="ad_id" class="form-control">
                @foreach ($ads as $ad)
                    <option value="{{$ad->id}}"> Sponsorizzazione per {{$ad->hours}} al costo di € {{$ad->price}} </option>
                @endforeach
            </select>
            @if($errors->has('ad_id'))
                <div class="error alert alert-danger">{{ $errors->first('ad_id') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="start_date">Imposta la data e l'orario di partenza</label>
            <input type="datetime-local" name="start_date" class="form-control" value="{{Carbon::now()->format('Y-m-d\\TH:i')}}">
            @if($errors->has('start_date'))
                <div class="error alert alert-danger">{{ $errors->first('start_date') }}</div>
            @endif
        </div>
        <input type="hidden" name="apartment_id" value="{{$apartment->id}}">

        <div>
            inserire pagamento!!!!
        </div>

        <button class="btn btn-dark" type="submit">Conferma sponsorizzazione</button>
    </form>
</div>   
@endsection