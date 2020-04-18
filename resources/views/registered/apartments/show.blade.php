@extends('layouts.layout')

@section('main')
<div class="container my-5">
<ul>
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
         <li><img src="{{asset($apartment->featured_image)}}" alt="{{$apartment->title}}" class="img-thumbnail"></li>
         <li>{{$apartment->visible}}</li>
      </ul>
   </li>
</ul>

@endsection