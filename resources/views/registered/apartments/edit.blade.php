@extends('layouts.layout')

@section('main')
<div class="container my-5">

<form action="{{route('registered.apartments.update', $apartment)}}" method="POST" enctype="multipart/form-data">
   @csrf
   @method('PATCH')

   <div class="form-group">
      <label for="title">Titolo</label>
   <input class="form-control" type="text" name="title" id="title" placeholder="Inserisci un titolo" value="{{$apartment->title}}">
      @if($errors->has('title'))
         <div class="error alert alert-danger">{{ $errors->first('title') }}</div>
      @endif
   </div>
   <div class="form-group">
      <label for="description">Descrizione</label>
      <textarea class="form-control" rows="10" name="description" id="description" placeholder="Inserisci una descrizione">{{$apartment->description}}</textarea>
      @if($errors->has('description'))
         <div class="error alert alert-danger">{{ $errors->first('description') }}</div>
      @endif
   </div>
   <div class="form-group">
      <label for="rooms_number">Numero di stanze</label>
      <input class="form-control" type="number" name="rooms_number" id="rooms_number" placeholder="Inserisci il numero stanze disponibili" value="{{$apartment->rooms_number}}">
      @if($errors->has('rooms_number'))
         <div class="error alert alert-danger">{{ $errors->first('rooms_number') }}</div>
      @endif
   </div>
   <div class="form-group">
      <label for="beds_number">Numero di letti</label>
      <input class="form-control" type="number" name="beds_number" id="beds_number" placeholder="Inserisci il numero letti disponibili" value="{{$apartment->beds_number}}">
      @if($errors->has('beds_number'))
         <div class="error alert alert-danger">{{ $errors->first('beds_number') }}</div>
      @endif
   </div>
   <div class="form-group">
      <label for="bathrooms_number">Numero di bagni</label>
      <input class="form-control" type="number" name="bathrooms_number" id="bathrooms_number" placeholder="Inserisci il numero bagni disponibili"  value="{{$apartment->bathrooms_number}}">
      @if($errors->has('bathrooms_number'))
         <div class="error alert alert-danger">{{ $errors->first('bathrooms_number') }}</div>
      @endif
   </div>
   <div class="form-group">
      <label for="size">Metri quadri</label>
      <input class="form-control" type="number" name="size" id="size" placeholder="Inserisci la grandezza dell'appartamento" value="{{$apartment->size}}">
      @if($errors->has('size'))
         <div class="error alert alert-danger">{{ $errors->first('size') }}</div>
      @endif
   </div>
   <div class="form-group" id="address-form-group">
      <label for="street">Via </label>
      <input class="form-control" type="text" name="street" id="street" placeholder="Inserisci la Via" value="{{ old('street') }}">
      <label for="number">Numero </label>
      <input class="form-control" type="number" name="number" id="number" placeholder="Inserisci il Civico" value="{{ old('number') }}">
      <label for="city">Città </label>
      <input class="form-control" type="text" name="city" id="city" placeholder="Inserisci la Città" value="{{ old('city') }}">
      <label for="province">Provincia </label>
      <input class="form-control" type="text" name="province" id="province" placeholder="Inserisci la Provincia" value="{{ old('province') }}">
      <input type="button" class="btn btn-dark mt-3" id="search-address" value="Cerca indirizzo">

      <ol class="list-group" id="address-suggestions">

      </ol>
   </div>
   <div class="form-group">
      <input class="form-control" type="text" name="address" id="address" value="{{$apartment->address}}" readonly placeholder="Nessun indirizzo">
      @if($errors->has('address'))
         <div class="error alert alert-danger">{{ $errors->first('address') }}</div>
      @endif
      <input type="hidden" name="latitude" id="latitude" value="{{$apartment->latitude}}">
      <input type="hidden" name="longitude" id="longitude" value="{{$apartment->longitude}}">
   </div>
   <div class="form-group">
      <label for="size">Features</label>
      <ul class="list-inline">
         @foreach ($features as $feature)
         <li class="list-inline-item">
            <input type="checkbox" name="features[]" value="{{$feature->id}}"
                @if ($apartment->features->contains($feature->id))
                    {{'checked'}}
                @endif
            >
            <span>{{$feature->description}}</span>
         </li>
         @endforeach
      </ul>
      @if($errors->has('features'))
         <div class="error alert alert-danger">{{ $errors->first('features') }}</div>
      @endif
   </div>
   <div class="form-group">
      <label for="price">Prezzo</label>
      <input class="form-control" type="number" name="price" id="price" placeholder="Inserisci il prezzo per notte" value="{{$apartment->price}}">
      @if($errors->has('price'))
         <div class="error alert alert-danger">{{ $errors->first('price') }}</div>
      @endif
   </div>
   <div class="form-group">
      <label for="featured_image">Immagine di anteprima</label>
      <img src="{{asset('storage/'.$apartment->featured_image)}}" alt="{{$apartment->title}}" class="img-thumbnail">
      <input class="form-control" type="file" name="featured_image" id="featured_image" accept="image/*" value="PROVA">
      @if($errors->has('featured_image'))
         <div class="error alert alert-danger">{{ $errors->first('featured_image') }}</div>
      @endif
   </div>
   <div class="form-group">
      <label for="nopublished">Da Pubblicare</label>
      <input type="radio" name="visible" value="0" id="nopublished" {{ ($apartment->visible == '0') ? 'checked' : '' }}>
      <label for="published">Pubblicato</label>
      <input type="radio" name="visible" value="1" id="published" {{ ($apartment->visible == '1') ? 'checked' : '' }}>
      @if($errors->has('visible'))
         <div class="error alert alert-danger">{{ $errors->first('visible') }}</div>
      @endif
   </div>
   <button class="btn btn-dark" type="submit">Aggiorna appartamento</button>
</form>

<script id="address-template" type="text/x-handlebars-template">
   <li id="address-suggestions-item" data-latitude="@{{latitude}}" data-longitude="@{{longitude}}" class="list-group-item">
      <p id="address-suggestions-item-content">@{{address}}</p>
   </li>
</script>

</div> <!-- / container -->

@endsection