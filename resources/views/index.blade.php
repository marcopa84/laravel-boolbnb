@extends('layouts.layout')

@section('main')

<div class="main-search">
   <div class="container-fluid px-0">
      
      <!-- CAROUSEL -->
      <div id="carouselExampleFade" class="carousel slide carousel-fade carousel-search" data-ride="carousel" data-interval="5000" data-pause="false">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <!-- <img class="d-block" src="https://c8.alamy.com/comp/M0DRBY/modern-interior-design-open-space-living-room-with-kitchen-M0DRBY.jpg" alt="First slide"> -->
            </div>
            <div class="carousel-item">
               <!-- <img class="d-block" src="{{asset('default_images/default_apartment.jpg')}}" alt="Second slide"> -->
            </div>
            <div class="carousel-item">
               <!-- <img class="d-block" src="https://static2.bigstockphoto.com/0/6/2/large1500/260951287.jpg" alt="Third slide"> -->
            </div>
         </div>

         <!-- SEARCH -->
         <div class="search-form">
            <h1>Cerca il tuo appartamento</h1>
            <form class="dark" action="{{route('apartments.search_apartments')}}" method="get">
               @csrf
               @method('GET')
               <div class="search-container row">
                  <div class="search-where">
                     <input type="text" id="address" class="form-control" placeholder="Dove?" autocomplete="off">
                     <input type="hidden" name="latitude" id="latitude" value="">
                     <input type="hidden" name="longitude" id="longitude" value="">
                     <input type="hidden" name="radius" id="radius" value="20">
                     <ol id="address-suggestions" class="list-group">

                     </ol>
                     <!-- <input id="search-address-home" class="btn btn-dark" type="button" value="Cerca indirizzo"> -->
                  </div>
                  <div class="search-guests">
                     <input type="number" class="form-control" name="beds_number" title="Quanti siete?" placeholder="Ospiti">
                  </div>
                  <div class="search-submit">
                     <button type="submit" class="btn" title="Cerca appartamenti">
                        <i class="fas fa-search"></i>
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>  <!-- / .carousel -->
   </div>  <!-- / .container-fluid -->
</div>  <!-- / .main-search -->

<div class="ads mt-5">
   <div class="container">

      <h3 class="small-caps text-center mb-5">Appartamenti in evidenza</h3>
      <div class="row">
      @if(count($apartments_ads) == 0)
         Nessuna sposorizzazione attiva
      @else
         @foreach($apartments_ads as $apartment_ads)

         <div class="col-md-6 col-lg-4">
            <a href="{{route('apartments.show', $apartment_ads->apartment_id)}}">
               <div class="card">
                  <img class="card-img-top" src="{{asset($apartment_ads->featured_image)}}" alt="Card image cap" title="Immagine di anteprima dell'appartamento">
                  <div class="card-body">
                     <h5 class="card-title">{{$apartment_ads->title}}</h5>
                     <p class="card-text">{{$apartment_ads->address}}</p>
                  </div>
                  <div class="card-footer">
                     <small class="text-muted">
                        <div class="n-rooms" title="Numero stanze">
                           <i class="fas fa-expand"></i> {{$apartment_ads->rooms_number}}
                        </div>
                        <div class="n-beds" title="Numero di letti">
                           <i class="fas fa-bed"></i> {{$apartment_ads->beds_number}}
                        </div>
                        <div class="n-baths" title="Numero di bagni">
                           <i class="fas fa-bath"></i> {{$apartment_ads->bathrooms_number}}
                        </div>
                     </small>
                        <div class="price" title="Prezzo a notte">
                           <i class="fas fa-euro-sign"></i> <span class="">{{$apartment_ads->price}}</span>
                        </div>
                  </div>
               </div>
            </a>
         </div>

         @endforeach
      @endif

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
