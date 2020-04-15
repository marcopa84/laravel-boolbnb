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
      </ul>
   </li>
   @endforeach
</ul>