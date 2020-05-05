@extends('layouts.layout')
@section('main')

<div class="container my-5">
    @if (!count($messages))
    <div class="alert alert-info" role="alert">
        <p>Non hai ricevuto ancora messaggi.</p>
    </div>
    @else
        <div class="messages-cards">
            @foreach ($messages as $key => $message)
            {{-- @dd($message) --}}
            <div class="card mb-3">
                <div class="card-header"">
                    <h4 class="mb-0">
                        Messaggio da: <a href="mailto:{{$message->email}}">{{$message->email}}</a> 
                    </h4>
                    <h5>
                        {{$message->title}}
                    </h5>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <time>{{date("d M Y - H:i", strtotime($message->created_at))}}</time>
                        </div>
                        <div class="col-10">
                            {{$message->content}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
