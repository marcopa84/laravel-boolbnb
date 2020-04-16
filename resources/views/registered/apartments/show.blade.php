@extends('layouts.layout')

@section('main')

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
         <!-- <li><img src="{{$apartment->featured_image}}" alt=""></li> -->
         <li><img src="{{asset('storage/'.$apartment->featured_image)}}" alt="" width="200"></li>
         <li>{{$apartment->visible}}</li>
      </ul>
   </li>
</ul>

@endsection