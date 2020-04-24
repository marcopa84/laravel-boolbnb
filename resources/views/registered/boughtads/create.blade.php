@extends('layouts.layout')
@section('main')
<div class="container my-5">
    <form action="{{route('registered.boughtads.store')}}" method="post">
        @csrf
        @method('POST')
        <h3>Stai sponsorizzando l'annuncio riguardante {{$apartment->title}}</h3>
        <div class="form-group">
            <label for="ad_id">Scegli la durata della sponsorizzazione</label>
            <select name="ad_id" class="form-control">
                @foreach ($ads as $ad)
                    <option value="{{$ad->id}}"> Sponsorizzazione per {{$ad->hours}} al costo di € {{$ad->price}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Imposta la data di partenza</label>
            <input type="date" name="start_date" class="form-control">
        </div>
        <input type="hidden" name="apartment_id" value="{{$apartment->id}}">

        <div>
            inserire pagamento!!!!
        </div>

        <button class="btn btn-dark" type="submit">Conferma sponsorizzazione</button>
    </form>
</div>   
@endsection