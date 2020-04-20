@extends('layouts.layout')

@section('main')
<div id="app">
  <div class="container my-5">
    <form action="{{route('registered.apartments.update', $apartment)}}" method="POST" enctype="multipart/form-data">
       @csrf
       @method('PATCH')

       <div class="form-group">
          <label for="title">Titolo</label>
       <input id="title" class="form-control" type="text" name="title" placeholder="Titolo" value="{{$apartment->title}}">
          @if($errors->has('title'))
             <div class="error alert alert-danger">{{ $errors->first('title') }}</div>
          @endif
       </div>
       <div class="form-group">
          <label for="description">Descrizione</label>
          <textarea id="description" class="form-control" rows="10" name="description">{{$apartment->description}}</textarea>
          @if($errors->has('description'))
             <div class="error alert alert-danger">{{ $errors->first('description') }}</div>
          @endif
       </div>
       <div class="form-group">
          <label for="rooms_number">Numero di stanze: @{{rooms_number}}</label>
          <input id="rooms_number" class="form-control" type="number" name="rooms_number" min="1" v-model="rooms_number" value="{{$apartment->rooms_number}}" placeholder="N° di stanze">
          @if($errors->has('rooms_number'))
             <div class="error alert alert-danger">{{ $errors->first('rooms_number') }}</div>
          @endif
       </div>
       <div class="form-group">
          <label for="beds_number">Numero di letti: @{{beds_number}}</label>
          <input id="beds_number" class="form-control" type="number" name="beds_number" v-model="beds_number" value="{{$apartment->beds_number}}" min="1" placeholder="N° di letti">
          @if($errors->has('beds_number'))
             <div class="error alert alert-danger">{{ $errors->first('beds_number') }}</div>
          @endif
       </div>
       <div class="form-group">
          <label for="bathrooms_number">Numero di bagni: @{{bathrooms_number}}</label>
          <input id="bathrooms_number" class="form-control" type="number" name="bathrooms_number" v-model="bathrooms_number" value="{{$apartment->bathrooms_number}}" min="1" placeholder="N° di bagni">
          @if($errors->has('bathrooms_number'))
             <div class="error alert alert-danger">{{ $errors->first('bathrooms_number') }}</div>
          @endif
       </div>
       <div class="form-group">
          <label for="size">Grandezza appartamento: @{{size}}m&sup2;</label>
          <input id="size" class="form-control" type="number" name="size" v-model="size" value="{{$apartment->size}}" min="1" placeholder="Grandezza in m&sup2; appartamento">
          @if($errors->has('size'))
             <div class="error alert alert-danger">{{ $errors->first('size') }}</div>
          @endif
       </div>
       <div class="form-group" id="address-form-group">
          <label for="street">Via </label>
          <input id="street" class="form-control" type="text" name="street" placeholder="Via" value="{{ old('street') }}">
          <label for="number">Numero </label>
          <input id="number" class="form-control" type="number" name="number" min="1" placeholder="N° Civico" value="{{ old('number') }}">
          <label for="zip">CAP </label>
          <input id="zip" class="form-control" type="number" name="zip" value="{{ old('zip') }}" placeholder="N° CAP">
          <label for="city">Città </label>
          <input id="city" class="form-control" type="text" name="city" value="{{ old('city') }}" placeholder="Citt&agrave;">
          <label for="province">Provincia </label>
          <input id="province" class="form-control" type="text" name="province" value="{{ old('province') }}" placeholder="Provincia">
          <input id="search-address" type="button" class="btn btn-dark mt-3" value="Cerca indirizzo">

          <ol id="address-suggestions" class="list-group">

          </ol>
       </div>
       <div class="form-group">
          <input id="address" class="form-control" type="text" name="address" value="{{$apartment->address}}" readonly placeholder="Nessun indirizzo selezionato">
          @if($errors->has('address'))
             <div class="error alert alert-danger">{{ $errors->first('address') }}</div>
          @endif
          <input id="latitude" type="hidden" name="latitude" value="{{$apartment->latitude}}">
          <input id="longitude" type="hidden" name="longitude" value="{{$apartment->longitude}}">
       </div>
       <div class="form-group">
          <label for="size">Servizi aggiuntivi</label>
          <ul class="list-inline">
             @foreach ($features as $feature)
             <li class="list-inline-item btn btn-outline-dark">
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
          <label for="price">Prezzo: @{{price}}&euro;</label>
          <input id="price" class="form-control" type="number" name="price" v-model="price" value="{{$apartment->price}}" min="1" step="0.1" placeholder="Prezzo per notte">
          @if($errors->has('price'))
             <div class="error alert alert-danger">{{ $errors->first('price') }}</div>
          @endif
       </div>
       <div class="form-group">
          <label for="featured_image">Immagine di anteprima</label>
          <img id="featured_image_preview" src="{{asset($apartment->featured_image)}}" alt="{{$apartment->title}}" class="img-thumbnail">
          <input id="featured_image" class="d-block" type="file" name="featured_image" accept="image/*" value="PROVA">
          @if($errors->has('featured_image'))
             <div class="error alert alert-danger">{{ $errors->first('featured_image') }}</div>
          @endif
       </div>
       <div class="form-group">
         <div class="form-group-radio">
           <label for="nopublished">Annuncio Pubblico</label>
           <input type="radio" name="visible" value="0" id="nopublished" {{ ($apartment->visible == '0') ? 'checked' : '' }}>
         </div>
          <div class="form-group-radio">
            <label for="published">Annuncio Privato</label>
            <input type="radio" name="visible" value="1" id="published" {{ ($apartment->visible == '1') ? 'checked' : '' }}>
          </div>
          @if($errors->has('visible'))
             <div class="error alert alert-danger">{{ $errors->first('visible') }}</div>
          @endif
       </div>
       <button class="btn btn-dark" type="submit">Aggiorna appartamento</button>
    </form>
  </div> <!-- / container -->
</div> <!-- / #app di Vue.js -->
@endsection

@section('scripts')
  {{-- ↓ template per riempire l'input #address che è readonly   --}}
  <script id="address-template" type="text/x-handlebars-template">
     <li id="address-suggestions-item" data-latitude="@{{latitude}}" data-longitude="@{{longitude}}" class="list-group-item">
        <p id="address-suggestions-item-content">@{{address}}</p>
     </li>
  </script>

  {{-- ↓ script per valorizzare dinamicamente le labels utilizzando Vue.js --}}
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script type="text/javascript">
    var app = new Vue({
    el: '#app',
    data: {
      rooms_number: '',
      bathrooms_number:'',
      beds_number:'',
      size:'',
      price:'',
    }
  });
  </script>

  {{-- ↓ script per cambiare focus degli input con il tasto Enter --}}
  <script type="text/jscript" charset="utf-8">
    $('form input').on('keydown', function(event) {
      if (event.which == 13) {
        var inputs = $(this).parents("form").find(":input");
        if (inputs[inputs.index(this) + 1] != null) {
            inputs[inputs.index(this) + 1].focus();
        }
        event.preventDefault();
      }
    });
  </script>

  {{-- ↓ script per checkare elementi anche cliccando sul nome --}}
  <script type="text/javascript" charser="utf-8">
    $('form li.list-inline-item').on('click', function() {
      // ho inserito due condizioni perché per alcuni browser, attr è undefined, per altri è false, così facendo la condizione funzionerà sempre
      if( $(this).find('input[type="checkbox"]').attr('checked') == undefined || $(this).find('input[type="checkbox"]').attr('checked') == false) {
        $(this).find('input[name="features[]"]').attr('checked','checked');
        $(this).removeClass('btn-outline-dark');
        $(this).addClass('btn-info');
      }
      else {
        $(this).find('input[name="features[]"]').removeAttr('checked');
        $(this).removeClass('btn-info');
        $(this).addClass('btn-outline-dark');
      }
    });
  </script>

  {{-- ↓ script per prevenire l'immissione di input non numerici negli input type="number" --}}
  <script type="text/javascript" charset="utf-8">
    $(document).on('focus', 'input[type="number"]', function() {
      var thisInput = $(this);
        $(this).on('keypress', function(e) {
          if(! (e.which < 58 && e.which > 47)) {
            e.preventDefault();
          }
        });
    });
  </script>

  {{-- ↓ script per vedere l'anteprima dell'immagine caricata --}}
  <script type="text/javascript" charset="utf-8">
    $('input[type="file"]').on('change', function(event){
      var output = document.getElementById('featured_image_preview');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src);
      }
    });
  </script>
@endsection
