<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1{
            color: coral;
            text-align: center;
        }
    </style>
</head>
<body>
    
    <h1>BoolBnB</h1>
    <br>
    <h3>Hai ricevuto un messaggio da {{$message_email->email}} riguardante il tuo appartamento {{$message_email->apartment->title}} situato all'indirizzo: {{$message_email->apartment->address}}.</h3>
    <br>
    <br>
    <h3>Messaggio:</h3><br>
    <p>{{$message_email->content}}</p>
    <br>
    <br>
    <a href="mailto:{{$message_email->email}}">Rispondi</a>


</body>
</html>