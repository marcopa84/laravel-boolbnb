@extends('layouts.layout')

@section('main')
  <div id="app">
    <div class="container my-5">
      <form action="{{route('registered.apartments.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('POST')
         <div class="form-group">
            <label for="title">Titolo</label>
            <input id="title" class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Titolo dell'appartamento">
            @if($errors->has('title'))
               <div class="error alert alert-danger">
                  {{ $errors->first('title') }}
               </div>
            @endif
         </div>
         <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea id="description" class="form-control" name="description" rows="10">
               {{ old('description') }}
            </textarea>
            @if($errors->has('description'))
               <div class="error alert alert-danger">{{ $errors->first('description') }}</div>
            @endif
         </div>
         <div class="form-group">
            <label for="rooms_number">N° di stanze: @{{rooms_number}}</label>
            <input id="rooms_number" class="form-control" type="number" min="1" name="rooms_number" v-model="rooms_number" value="{{ old('rooms_number') }}" placeholder="N° stanze disponibili">
            @if($errors->has('rooms_number'))
               <div class="error alert alert-danger">{{ $errors->first('rooms_number') }}</div>
            @endif
         </div>
         <div class="form-group">
            <label for="beds_number">N° di letti: @{{beds_number}}</label>
            <input id="beds_number" class="form-control" type="number" name="beds_number" v-model="beds_number" value="{{ old('beds_number') }}" min="1" placeholder="N° letti disponibili">
            @if($errors->has('beds_number'))
               <div class="error alert alert-danger">{{ $errors->first('beds_number') }}</div>
            @endif
         </div>
         <div class="form-group">
            <label for="bathrooms_number">N° di bagni: @{{bathrooms_number}}</label>
            <input id="bathrooms_number" class="form-control" type="number" name="bathrooms_number" v-model="bathrooms_number" value="{{ old('bathrooms_number') }}" min="1" placeholder="N° bagni disponibili">
            @if($errors->has('bathrooms_number'))
               <div class="error alert alert-danger">{{ $errors->first('bathrooms_number') }}</div>
            @endif
         </div>
         <div class="form-group">
            <label for="size">Grandezza appartamento: @{{size}}m&sup2;</label>
            <input id="size" class="form-control" type="number" name="size" v-model="size" value="{{ old('size') }}" min="1" placeholder="Grandezza in m&sup2; dell'appartamento">
            @if($errors->has('size'))
               <div class="error alert alert-danger">{{ $errors->first('size') }}</div>
            @endif
         </div>
         <div id="address-form-group" class="form-group">
            <label for="street">Via</label>
            <input id="street" class="form-control" type="text" name="street" value="{{ old('street') }}" placeholder="Via">
            <label for="number">N° Civico</label>
            <input id="number" class="form-control" type="number" name="number" value="{{ old('number') }}" min="1"  placeholder="N° Civico">
            <label for="zip">CAP </label>
            <input id="zip" class="form-control" type="number" name="zip" value="{{ old('zip') }}" placeholder="CAP">
            <label for="city">Citt&agrave; </label>
            <input id="city" class="form-control" type="text" name="city" value="{{ old('city') }}" placeholder="Citt&agrave;">
            <label for="province">Provincia</label>
            <input id="province" class="form-control" type="text" name="province"  value="{{ old('province') }}" placeholder="Provincia">
            <input id="search-address" class="btn btn-dark mt-3" type="button" value="Cerca indirizzo">

            <ol id="address-suggestions" class="list-group">

            </ol>
         </div>
         <div class="form-group">
            <input id="address" class="form-control" type="text" name="address" value="{{ old('address') }}" placeholder="Nessun indirizzo selezionato" readonly>
            @if($errors->has('address'))
               <div class="error alert alert-danger">{{ $errors->first('address') }}</div>
            @endif
            <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
            <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">
         </div>
         <div class="form-group">
            <label for="size">Servizi aggiuntivi</label>
            <ul id="features" class="list-inline">
               @foreach ($features as $feature)
               <li class="list-inline-item btn btn-outline-dark">
                  <input type="checkbox" name="features[]" value="{{$feature->id}}"
                  @if(!empty(old('features')))
                     @for($i = 0; $i < count(old('features')); $i++ )
                       @if(old('features')[$i] == $feature->id) {{'checked'}}
                       @endif
                     @endfor
                   @endif >
                  <span>{{$feature->description}}</span>
               </li>
               @endforeach
            </ul>
            @if($errors->has('features'))
               <div class="error alert alert-danger">{{ $errors->first('features') }}</div>
            @endif
         </div>
         <div class="form-group">
            <label for="price">Prezzo: @{{price}}</label>
            <input id="price" class="form-control" type="number" name="price" v-model="price" value="{{ old('price') }}" min="1" step="0.1" placeholder="Inserisci il prezzo per notte">
            @if($errors->has('price'))
               <div class="error alert alert-danger">{{ $errors->first('price') }}</div>
            @endif
         </div>
         <div class="form-group">
            <label for="featured_image">Immagine di anteprima</label>
            <img id="featured_image_preview" class="d-none img-thumbnail" alt="Immagine di anteprima dell'appartamento">
            <input id="featured_image" class="d-block" type="file" name="featured_image" accept="image/*">
            @if($errors->has('featured_image'))
               <div class="error alert alert-danger">{{ $errors->first('featured_image') }}</div>
            @endif
         </div>
         <div class="form-group">
            <div class="form-group-radio">
              <label for="nopublished">Annuncio Pubblico</label>
              <input id="nopublished" type="radio" name="visible" value="0" {{ (old('visible') == '0') ? 'checked' : '' }}>
            </div>
            <div class="form-group-radio">
              <label for="published">Annuncio Privato</label>
              <input id="published" type="radio" name="visible" value="1" {{ (old('visible') == '1') ? 'checked' : '' }}>
            </div>
            @if($errors->has('visible'))
               <div class="error alert alert-danger">{{ $errors->first('visible') }}</div>
            @endif
         </div>
         <button class="btn btn-dark" type="submit">Inserisci appartamento</button>
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
        $('#featured_image_preview').removeClass('d-none');
      }
    });
  </script>
@endsection
