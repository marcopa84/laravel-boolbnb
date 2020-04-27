<?php

namespace App\Http\Controllers;

use Auth;
use Braintree;
use App\Bought_ad;
use App\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
  public function checkout(Request $request)
  {
    $order = Order::where('order_code', $request['order_code'])->first();
    if(!empty($order)) {
      $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
      ]);
      $result = $gateway->transaction()->sale([
        'amount' => $order->ad->price,
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
          'start_date' => $order->start_date,
          'end_date' => $order->end_date,
          'ad_id' => $order->ad_id,
          'apartment_id' => $order->apartment_id,
          'transaction' => $transaction->id,
        ]);
        Order::where('order_code', $request['order_code'])->delete();
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
