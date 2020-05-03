<?php

namespace App\Http\Controllers\Registered;

use App\Ad;
use App\Apartment;
use App\Bought_ad;
use App\Http\Controllers\Controller;
use App\Cart;
use Braintree;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoughtAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::where('user_id', Auth::id())->get();
        return view('registered.apartments.ads.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Apartment $apartment)
    {
        $data = [
            'apartment' => $apartment,
            'ads' => Ad::all(),
        ];
        return view('registered.apartments.ads.create', $data);
    }


    public function storeCart(Request $request, Apartment $apartment, Faker $faker)
    {

        $validateRules = [
            'ad_id' => 'required|integer|exists:App\Ad,id',
            'start_date' => 'required|date|after:now'
        ];
        $request->validate($validateRules);

        $hours = Ad::where('id', $request['ad_id'])->first()->hours;
        $start_date = Carbon::createFromDate($request['start_date'])->format('Y-m-d H:i:s');
        $end_date = Carbon::createFromDate($request['start_date'])->add($hours, 'hour')->format('Y-m-d H:i:s');
        $cart = new Cart;
        $cart->start_date = $start_date;
        $cart->end_date = $end_date;
        $cart->ad_id = $request['ad_id'];
        $cart->apartment_id = $apartment->id;
        $queryCartCodes = Cart::select('cart_code')->get();
        $cartCodes = [];
        $newCartCode = '';
        for($i = 0; $i < count($queryCartCodes); $i++) {
          $cartCodes[] = $queryCartCodes[$i];
        }
        do {
          $newCartCode = $faker->sha256();
        } while( in_array($newCartCode, $cartCodes) );
        $cart->cart_code = $newCartCode;
        $cart->save();
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
            ]);
        $token = $gateway->ClientToken()->generate();
        $data = [
            'cart' => Cart::where('cart_code', $newCartCode)->first(),
            'amount' => Ad::where('id', $request['ad_id'])->first()->price,
            'gateway' => $gateway,
            'token' => $token,
        ];
        return view('payments.form', $data);
    }
    
}
