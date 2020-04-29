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
            <div class="card mb-3">
                <div class="card-header"">
                    <h4 class="mb-0">
                        Messaggio da: {{$message->email}}
                    </h4>
                    <span>Ricevuto alle: </span><time>{{
                        date("d M Y - H:m", strtotime($message->created_at))
                    }}</time>
                </div>
                <div class="card-body">
                    {{$message->content}}
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
