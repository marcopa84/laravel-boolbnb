<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $checkoutData;
    // private $pippo;

    // public function __construct()
    // {
    //     $this->form ();
    // }

    public function form()
    {
        $this->checkoutData= session('checkoutData');
        return view('payments.primo', $this->checkoutData);
    }
    
    public function checkout(Request $request)
    {   
     
        // dd($this->pippo);
        dd($this->checkoutData);
        dd($request->all());
    }
}
