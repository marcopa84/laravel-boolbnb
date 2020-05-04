@extends('layouts.layout')
@section('main')

<div class="container-fluid pt-5 filter__search">
  <div class="container">
  
  <div class="row">
    <div class="col-12 mb-5">
        <form id="apartments_filter" action="{{ route('apartments.search_apartments') }}">
          @csrf
          <div class="row">
            <div class="col-sm-6 col-md-2">
              <label for="beds_number">Posti letto</label>
              <input id="beds_number" class="form-control" type="number" name="beds_number" value="{{ $beds_number }}{{ old('rooms_number') }}" min="1" placeholder="N° posti letto">
            </div>
            <div class="col-sm-6 col-md-2">
              <label for="rooms_number">Stanze</label>
              <input id="rooms_number" class="form-control" type="number" name="rooms_number" value="{{ $rooms_number }}{{ old('rooms_number') }}" min="1" placeholder="N° stanze">
            </div>
            <div class="col-sm-12 col-md-6">
              <label for="size">Servizi aggiuntivi</label>
              <ul id="features" class="list-inline">
                @foreach ($features as $feature)
                <li class="list-inline-item btn btn-outline-dark">
                  <input type="checkbox" name="features[]" value="{{$feature->id}}"
                    @if(isset($selected_features))
                      @for( $i = 0; $i < count($selected_features); $i++ )
                        @if($selected_features[$i] == $feature->id) {{'checked'}}
                        @endif
                      @endfor
              {{--  @elseif(!empty(old('features')))
                      @for( $i = 0; $i < count(old('features')); $i++ )
                        @if( old('features')[$i] == $feature->id ) {{'checked'}}
                        @endif
                      @endfor --}}
                    @endif >
                  <span class="featured_description">{{$feature->description}}</span>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="col-md-2">
              <label for="radius">Raggio ricerca</label>
              <select class="d-block" name="radius">
                <option value="20">20 Km</option>
                <option value="40">40 Km</option>
                <option value="60">60 Km</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input type="hidden" name="old_selected_rad" value="{{$radius}}">
              <input type="hidden" name="latitude" value="{{$latitude}}">
              <input type="hidden" name="longitude" value="{{$longitude}}">
              <!-- <button type="submit" class="btn btn-dark" title="Cerca appartamenti">
                <i class="fas fa-search"></i><span> Cerca</span>
              </button> -->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container my-5">
  <div class="row">
{{-- sponsorizzati --}}
    <section class="col-12 filter-ads">
      
        @foreach ($apartments_sponsorized as $apartment)
        <div class="card dash" data-beds="{{$apartment->beds_number}}" data-rooms="{{$apartment->rooms_number}}" data-features="{{$apartment->features}}">
          <div class="card-image">
            <img class="card-img-top" src="{{asset($apartment->featured_image)}}" alt="Immagine di anteprima dell'appartamento">
          </div>
          <div class="card-body">
            <div class="card-body-text">
              <h3 class="card-title">{{$apartment->title}}</h3>
              <p class="card-text lead">{{$apartment->address}}</p>
              <p class="card-distance"><span>{{$apartment->distance}}km </span><span><i class="fas fa-bed"></i> {{$apartment->beds_number}} </span><span><i class="fas fa-expand"></i> {{$apartment->rooms_number}}</span></p>
              <div class="apartment-features-list">
                @foreach ($apartment->features as $feature)
                @if ($feature->id == 1)
                <span><i class="fas fa-wifi"></i> Wi-Fi</span>
                @endif
                @if ($feature->id == 2)
                  <span><i class="fas fa-parking fa-1.5x"></i> Posto auto</span>
                @endif
                @if ($feature->id == 3)
                  <span><i class="fas fa-swimmer"></i> Piscina</span>
                @endif
                @if ($feature->id == 4)
                  <span><i class="fas fa-concierge-bell"></i> Portineria</span>
                @endif
                @if ($feature->id == 5)
                  <span><i class="fas fa-hot-tub"></i> Sauna</span>
                @endif
                @if ($feature->id == 6)
                  <span><i class="fas fa-water"></i> Vista mare</span>
                @endif
                @endforeach
              </div>
            </div>
            <div class="card-dash-buttons">
              <a href="{{route('apartments.show', $apartment)}}"><button class="btn btn-dark mt-2">Visualizza</button></a>
            </div>
            <i class="fas fa-star icon-ads" title="In evidenza"></i>
          </div>
        </div>
        @endforeach

    </section>
{{-- /sponsorizzati --}}
    <div class="col-12 mt-3">
      @if (empty($filtered_apartments))
        <div class="alert alert-info" role="alert">
          <p>Non ci sono appartamenti disponibili</p>
        </div>
      @else
        @foreach ($filtered_apartments as $apartment)
        <div class="card dash" data-beds="{{$apartment->beds_number}}" data-rooms="{{$apartment->rooms_number}}" data-features="{{$apartment->features}}">
          <div class="card-image">
            <img class="card-img-top" src="{{asset($apartment->featured_image)}}" alt="Immagine di anteprima dell'appartamento">
          </div>
          <div class="card-body">
            <div class="card-body-text">
              <h3 class="card-title">{{$apartment->title}}</h3>
              <p class="card-text lead">{{$apartment->address}}</p>
              <p class="card-distance"><span>{{$apartment->distance}}km </span><span><i class="fas fa-bed"></i> {{$apartment->beds_number}} </span><span><i class="fas fa-expand"></i> {{$apartment->rooms_number}}</span></p>
              <div class="apartment-features-list">
                @foreach ($apartment->features as $feature)
                @if ($feature->id == 1)
                <span><i class="fas fa-wifi"></i> Wi-Fi</span>
                @endif
                @if ($feature->id == 2)
                  <span><i class="fas fa-parking fa-1.5x"></i> Posto auto</span>
                @endif
                @if ($feature->id == 3)
                  <span><i class="fas fa-swimmer"></i> Piscina</span>
                @endif
                @if ($feature->id == 4)
                  <span><i class="fas fa-concierge-bell"></i> Portineria</span>
                @endif
                @if ($feature->id == 5)
                  <span><i class="fas fa-hot-tub"></i> Sauna</span>
                @endif
                @if ($feature->id == 6)
                  <span><i class="fas fa-water"></i> Vista mare</span>
                @endif
                @endforeach
              </div>
            </div>
            <div class="card-dash-buttons">
              <a href="{{route('apartments.show', $apartment)}}"><button class="btn btn-dark">Visualizza</button></a>
            </div>
          </div>
        </div>
        @endforeach
      @endif
    </div>
  </div>
</div>
@endsection


@section('styles')
<style>
  input[type="checkbox" i]{
    display: none;
  }
  .btn-info{
    border: 1px solid rgba(0,0,0,0.2);
  }
  .apartment-features-list{
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
  }
  .apartment-features-list span{
    margin-right: 0.5rem;
  }
  .card{
    position: relative;
  }
  .cards-animation{
    animation-name: cards;
    animation-duration: 0.7s;
    animation-timing-function: ease-in-out;
    backface-visibility: visible;
  }
  @keyframes cards{
    0% {
      opacity: 0;
      transform: perspective(4000px) rotate3d(0,1,0,5deg);
    }
    40% {
      transform: perspective(4000px) rotate3d(0,1,0,-20deg);
    }
    60% {
      opacity: 1;
      transform: perspective(4000px) rotate3d(0,1,0,10deg);
    }
    80% {
      transform: perspective(4000px) rotate3d(0,1,0,-5deg);
    }
    100% {
      transform: perspective(4000px);
    }
   }

</style>
@endsection
