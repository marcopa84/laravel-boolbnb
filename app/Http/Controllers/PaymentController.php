<?php

namespace App\Http\Controllers;

use Auth;
use Braintree;
use App\Bought_ad;
use App\Cart;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
  public function checkout(Request $request)
  {
    $cart = Cart::where('cart_code', $request['cart_code'])->first();
    if(!empty($cart)) {
      $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
      ]);
      $result = $gateway->transaction()->sale([
        'amount' => $cart->ad->price,
        'paymentMethodNonce' => $request->payment_method_nonce,
        'customer' => [
          'email' => Auth::user()->email,
        ],
        'options' => [
        'submitForSettlement' => true
        ]
      ]);
      if ($result->success) {
        $transaction = $result->transaction;
        Bought_ad::create([
          'start_date' => $cart->start_date,
          'end_date' => $cart->end_date,
          'ad_id' => $cart->ad_id,
          'apartment_id' => $cart->apartment_id,
          'transaction' => $transaction->id,
        ]);
        Cart::where('cart_code', $request['cart_code'])->delete();
        return redirect()->route('registered.ads.index')->with('message', 'Transazione avvenuta con successo. il codice ID della transazione: '. $transaction->id);
      }
      else {
        $errorString = "";
        foreach ($result->errors->deepAll() as $error) {
        $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }
        return back()->withErrors('An error occurred with the message: '.$result->message);
      }
    }
    else return back()->with('error', 'L\'ordine non esiste');
  }
}
