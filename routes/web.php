<?php

use App\Bought_ad;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Auth routes
Auth::routes();

// Guests Routes
Route::get('/', 'ApartmentController@index')->name('home');
Route::get('/apartments/{apartment}', 'ApartmentController@show')->name('apartments.show');
Route::post('/apartments/{apartment}', 'MessageController@store')->name('message.store');

// Payment routes
Route::get('/payment/form', 'PaymentController@form')->name('payment.form');
Route::post('/payment/checkout/', function(Request $request){
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
              return redirect()->route('registered.ads.index')->with('message', 'Transaction successful. The ID is: '. $transaction->id);
            }
            else {
              $errorString = "";
              foreach ($result->errors->deepAll() as $error) {
              $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
              }
            return back()->withErrors('An error occurred with the message: '.$result->message);
            }
          }
          else return back()->withMessage('A chi t\'è muort e stra muort');
})->name('payment.checkout');

// Registered routes
Route::get('/registered', 'RegisteredController@index')->name('registered.index');
Route::get('/registered/messages', 'RegisteredController@messages')->name('registered.messages');
Route::name('registered.')
    ->prefix('registered')
    ->namespace('Registered')
    ->middleware('auth')
    ->group(function () {
        Route::get('/apartments/ads', 'BoughtAdController@index')->name('ads.index');
        Route::get('/apartments/ads/{apartment}', 'BoughtAdController@create')->name('ads.create');
        Route::post('/apartments/ads/{apartment}', 'BoughtAdController@storeOrder')->name('ads.store_order');
        // Route::post('/apartments/ads', 'BoughtAdController@store')->name('ads.store');
        Route::resource('views', 'ViewController');
        // Route::resource('ads', 'AdController');
        // Route::resource('boughtAds', 'BoughtAdController');
        // Route::resource('features', 'FeatureController');
        // Route::resource('images', 'ImageController');
        // Route::resource('roles', 'RoleController');
        Route::resource('apartments', 'ApartmentController');
    });
