{{-- QUESTI ANDRANNO PER TUTTE LA PAGINE --}}
@if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif
@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif
{{-- QUESTI ANDRANNO PER TUTTE LA PAGINE --}}


<form action="{{route('registered.apartments.store')}}" method="POST" enctype="multipart/form-data">
   @csrf
   @method('POST')

   <div class="form-group">
      <label for="title">Titolo</label>
      <input class="form-control" type="text" name="title" id="title" placeholder="Inserisci un titolo" value="{{ old('title') }}">
   </div>
   <div class="form-group">
      <label for="description">Descrizione</label>
      <textarea class="form-control" rows="10" name="description" id="description" placeholder="Inserisci una descrizione">{{ old('description') }}</textarea>
   </div>
   <div class="form-group">
      <label for="rooms_number">Numero di stanze</label>
      <input class="form-control" type="number" name="rooms_number" id="rooms_number" placeholder="Inserisci il numero stanze disponibili" value="{{ old('rooms_number') }}">
   </div>
   <div class="form-group">
      <label for="beds_number">Numero di letti</label>
      <input class="form-control" type="number" name="beds_number" id="beds_number" placeholder="Inserisci il numero letti disponibili" value="{{ old('beds_number') }}">
   </div>
   <div class="form-group">
      <label for="bathrooms_number">Numero di bagni</label>
      <input class="form-control" type="number" name="bathrooms_number" id="bathrooms_number" placeholder="Inserisci il numero bagni disponibili"  value="{{ old('bathrooms_number') }}">
   </div>
   <div class="form-group">
      <label for="size">Metri quadri</label>
      <input class="form-control" type="number" name="size" id="size" placeholder="Inserisci la grandezza dell'appartamento" value="{{ old('size') }}">
   </div>
   <div class="form-group" id="address-form-group">
      <label for="street">Via </label>
      <input class="form-control" type="text" id="street" placeholder="Inserisci la Via">
      <label for="number">Numero </label>
      <input class="form-control" type="number" id="number" placeholder="Inserisci il Civico">
      <label for="city">Città </label>
      <input class="form-control" type="text" id="city" placeholder="Inserisci la Città">
      <label for="province">Provincia </label>
      <input class="form-control" type="text" id="province" placeholder="Inserisci la Provincia">
      <input type="button" id="search-address" value="Cerca indirizzo">
      
      <ol class="list-group" id="address-suggestions">

      </ol>
      <input type="text" name="address" id="address" value="{{ old('address') }}" readonly>
      <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
      <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">
   </div>
   <div class="form-group">
      <label for="price">Prezzo </label>
      <input class="form-control" type="number" name="price" id="price" placeholder="Inserisci il prezzo per notte" value="{{ old('price') }}">
   </div>
   <div class="form-group">
      <label for="featured_image"></label>
      <input class="form-control" type="file" name="featured_image" id="featured_image" accept="image/*">
   </div>
   <div class="form-group">
      <label for="nopublished">Da Pubblicare</label>
      <input type="radio" name="visible" value="0" id="nopublished"{{--  if({{ old('value') }} == 0) ? checked : '' --}}>
      <label for="published">Pubblicato</label>
      <input type="radio" name="visible" value="1" id="published" {{-- if({{ old('value') }} == 1) ? checked : '' --}}>
   </div>
   <input type="submit" value="Inserisci">
</form>

<script id="address-template" type="text/x-handlebars-template">
   <li id="address-suggestions-item" data-latitude="@{{latitude}}" data-longitude="@{{longitude}}" class="list-group-item">
      <p id="address-suggestions-item-content">@{{address}}</p>
   </li>
</script>

<script src="{{asset('js/app.js')}}"></script>