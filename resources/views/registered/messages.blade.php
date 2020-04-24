@extends('layouts.layout')

@section('main')
<div class="container my-5">
    @if (!count($messages))
    <div class="alert alert-info" role="alert">
        <p>Non hai ricevuto ancora messaggi.</p>
    </div>
    @else
    <ul>
    @foreach ($messages as $message)
    <li>MESSAGGIO:
        <ul>
            <li> {{$message->email}} </li>
            <li> {{$message->content}} </li>
            <li> {{$message->created_at}} </li>
        </ul>
    </li>      
    @endforeach
    </ul>
    @endif
</div>


@endsection