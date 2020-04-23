<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Message;

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

        if (!$saved) {
            return redirect()->back()->with('error', 'Errore durante l\'invio del messaggio');
        }

        return redirect()->back()->with('message', 'Il messaggio è stato inviato correttamente');
    }
}
