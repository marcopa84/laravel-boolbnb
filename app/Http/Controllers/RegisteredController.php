<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class RegisteredController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $messages = User::where('users.id', Auth::id())
            ->join('apartments', 'users.id', '=', 'apartments.user_id')
            ->join('messages', 'apartments.id', '=', 'messages.apartment_id')
            ->select('messages.*')
            ->get();
        dd($messages);
        return view('registered.index', compact('messages'));
    }
}
