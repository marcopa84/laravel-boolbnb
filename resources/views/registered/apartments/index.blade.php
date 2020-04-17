@extends('layouts.layout')

@section('main')
<div class="container my-5">
<ul>
   @foreach ($apartments as $apartment)
   <li>{{$apartment->title}}
      <ul>
         <li>{{$apartment->description}}</li>
         <li>{{$apartment->beds_number}}</li>
         <li>{{$apartment->rooms_number}}</li>
         <li>{{$apartment->bathrooms_number}}</li>
         <li>{{$apartment->price}}</li>
         <li>{{$apartment->size}}</li>
         <li>{{$apartment->address}}</li>
         <li>{{$apartment->latitude}}</li>
         <li>{{$apartment->longitude}}</li>
         <li>{{$apartment->featured_image}}</li>
         <li><a href="{{route('registered.apartments.show', $apartment)}}">Show</a></li>
         <li><a href="{{route('registered.apartments.edit', $apartment)}}">EDIT</a></li>
         <li>
            <form action="{{route('registered.apartments.destroy', $apartment)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>  
            </form>
         
         </li>
      </ul>
   </li>
   @endforeach
</ul>


@endsection