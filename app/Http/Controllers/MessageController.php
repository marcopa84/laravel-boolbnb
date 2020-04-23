<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Message;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(Request $request, Apartment $apartment)
    {
        $validateRules = [
            'email' => 'required|email',
            'content' => 'required|string',
        ];
        $data = $request->all();
        $request->validate($validateRules);

        $message = new Message;
        $message->fill($data);
        $message->apartment_id = $apartment->id;
        
        $saved = $message->save();

        $message_email = $message;

        if (!$saved) {
            return redirect()->back()->with('error', 'Errore durante l\'invio del messaggio');
        }
        Mail::to($apartment->user->email)->send(new SendNewMail($message_email));

        return redirect()->back()->with('message', 'Il messaggio è stato inviato correttamente');
    }
}
