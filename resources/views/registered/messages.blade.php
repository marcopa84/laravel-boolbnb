@extends('layouts.layout')

@section('main')
    @foreach ($messages as $message)
        <ul>
            <li> {{$message->email}} </li>
            <li> {{$message->content}} </li>
            <li> {{$message->created_at}} </li>
        </ul>
        
    @endforeach
@endsection