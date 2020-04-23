@extends('layouts.layout')

@section('main')
<div class="main-search">
   <div class="container">
      <h1>Cerca il tuo appartamento</h1>
      <form class="dark" action="{{route('api.apartments.index')}}" method="get">
         @csrf
         @method('GET')
         <div class="search-container row">
            <div class="col-md-4">
               <input type="text" id="address" class="form-control" placeholder="Dove?" autocomplete="off">
               <input type="hidden" name="latitude" id="latitude" value="">
               <input type="hidden" name="longitude" id="longitude" value="">
               <input type="hidden" name="radius" id="radius" value="20">
               <ol id="address-suggestions" class="list-group">
                  
               </ol>
               <input id="search-address-home" class="btn btn-dark mt-3" type="button" value="Cerca indirizzo">
            </div>
            <div class="col-md-4">
               <input type="text" class="form-control" title="Inserisci la data di tuo interesse" placeholder="Data" value="">
            </div>
            <div class="col-md-4">
               <input type="number" class="form-control" name="beds_number" title="Quanti siete?" placeholder="Ospiti">
            </div>
         </div>
         <div class="row">
            <div class="col">
               <button type="submit" class="btn btn-dark" title="Cerca appartamenti">
               <i class="fas fa-search"></i><span>Cerca</span>
               </button>
            </div>
         </div>
      </form>
   </div>
</div>

<div class="ads mt-5">
   <div class="container">

      <h3 class="small-caps text-center mb-5">Appartamenti in evidenza</h3>
      <div class="row">
         <div class="col-md-6 col-lg-4">
            <div class="card">
               <img class="card-img-top" src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/living-room-9-1537479929.jpg" alt="Card image cap" title="Immagine di anteprima dell'appartamento">
               <div class="card-body">
                  <h5 class="card-title">Titolo Appartamento</h5>
                  <p class="card-text">Indirizzo appartamento</p>
               </div>
               <div class="card-footer">
                  <small class="text-muted">
                     <div class="n-users" title="Numero massimo ospiti">
                        <i class="fas fa-users"></i> 3
                     </div>
                     <div class="n-rooms" title="Numero di bagni">
                        <i class="fas fa-expand"></i> 2
                     </div>
                     <div class="n-beds" title="Numero di letti">
                        <i class="fas fa-bed"></i> 2
                     </div>
                  </small>
                  <div class="price" title="Prezzo a notte">
                     €300.00
                  </div>
               </div>
            </div>
         </div>

         <div class="col-md-6 col-lg-4">
            <div class="card">
               <img class="card-img-top" src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/living-room-9-1537479929.jpg" alt="Card image cap" title="Immagine di anteprima dell'appartamento">
               <div class="card-body">
                  <h5 class="card-title">Titolo Appartamento</h5>
                  <p class="card-text">Indirizzo appartamento</p>
               </div>
               <div class="card-footer">
                  <small class="text-muted">
                     <div class="n-users" title="Numero massimo ospiti">
                        <i class="fas fa-users"></i> 3
                     </div>
                     <div class="n-rooms" title="Numero di bagni">
                        <i class="fas fa-expand"></i> 2
                     </div>
                     <div class="n-beds" title="Numero di letti">
                        <i class="fas fa-bed"></i> 2
                     </div>
                  </small>
                  <div class="price" title="Prezzo a notte">
                     €300.00
                  </div>
               </div>
            </div>
         </div>

         <div class="col-md-6 col-lg-4">
            <div class="card">
               <img class="card-img-top" src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/living-room-9-1537479929.jpg" alt="Card image cap" title="Immagine di anteprima dell'appartamento">
               <div class="card-body">
                  <h5 class="card-title">Titolo Appartamento</h5>
                  <p class="card-text">Indirizzo appartamento</p>
               </div>
               <div class="card-footer">
                  <small class="text-muted">
                     <div class="n-users" title="Numero massimo ospiti">
                        <i class="fas fa-users"></i> 3
                     </div>
                     <div class="n-rooms" title="Numero di bagni">
                        <i class="fas fa-expand"></i> 2
                     </div>
                     <div class="n-beds" title="Numero di letti">
                        <i class="fas fa-bed"></i> 2
                     </div>
                  </small>
                  <div class="price" title="Prezzo a notte">
                     €300.00
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection

@section('scripts')

  {{-- ↓ template per riempire l'input #address che è readonly   --}}
  <script id="address-template" type="text/x-handlebars-template">
     <li id="address-suggestions-item" data-latitude="@{{latitude}}" data-longitude="@{{longitude}}" class="list-group-item">
        <p id="address-suggestions-item-content">@{{address}}</p>
     </li>
  </script>

{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js" async></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" async></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" async></script> --}}


{{-- <script type="text/javascript">
   $(function() {

      $('input[name="datefilter"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
               cancelLabel: 'Clear'
            }
      });

      $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
      });

      $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
      });

   });
</script> --}}

@endsection
