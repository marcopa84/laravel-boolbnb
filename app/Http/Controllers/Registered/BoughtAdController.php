<?php

namespace App\Http\Controllers\Registered;

use App\Ad;
use App\Apartment;
use App\Bought_ad;
use App\Http\Controllers\Controller;
use App\Order;
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


    public function storeOrder(Request $request, Apartment $apartment, Faker $faker)
    {

        $validateRules = [
            'ad_id' => 'required|integer|exists:App\Ad,id',
            'start_date' => 'required|date|after:now'
        ];
        $request->validate($validateRules);

        $hours = Ad::where('id', $request['ad_id'])->first()->hours;
        $start_date = Carbon::createFromDate($request['start_date'])->format('Y-m-d H:i:s');
        $end_date = Carbon::createFromDate($request['start_date'])->add($hours, 'hour')->format('Y-m-d H:i:s');
        $order = new Order;
        $order->start_date = $start_date;
        $order->end_date = $end_date;
        $order->ad_id = $request['ad_id'];
        $order->apartment_id = $apartment->id;
        $queryOrderCodes = Order::select('order_code')->get();
        $orderCodes = [];
        $newOrderCode = '';
        for($i = 0; $i < count($queryOrderCodes); $i++) {
          $orderCodes[] = $queryOrderCodes[$i];
        }
        do {
          $newOrderCode = $faker->sha256();
        } while( in_array($newOrderCode, $orderCodes) );
        $order->order_code = $newOrderCode;
        $order->save();
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
            ]);
        $token = $gateway->ClientToken()->generate();
        $data = [
            'order' => Order::where('order_code', $newOrderCode)->first(),
            'amount' => Ad::where('id', $request['ad_id'])->first()->price,
            'gateway' => $gateway,
            'token' => $token,
        ];
        return view('payments.form', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validateRules = [
        //     'ad_id' => 'required|integer|exists:App\Ad,id',
        //     'apartment_id' => 'required|integer|exists:App\Apartment,id',
        //     'start_date' => 'required|date|after:yesterday'
        // ];
        // $data = $request->all();
        // $request->validate($validateRules);


        // $bought_ad = new Bought_ad;
        // $hours = Ad::where('id', $data['ad_id'])->first()->hours;
        // $end_date = Carbon::createFromDate($data['start_date'])-> add($hours, 'hour');
        // $data['end_date'] = $end_date;
        // $bought_ad->fill($data);
        // $saved = $bought_ad->save();
        //
        // if (!$saved) {
        //     return redirect()->back()->with('error', 'Errore durante l\'inserimento della sponsorizzazione.');
        // }
        //
        // return redirect()->route('registered.apartments.ads.index')->with('message', 'Sponsorizzazione inserita correttamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bought_ad  $bought_ad
     * @return \Illuminate\Http\Response
     */
    public function show(Bought_ad $bought_ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bought_ad  $bought_ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Bought_ad $bought_ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bought_ad  $bought_ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bought_ad $bought_ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bought_ad  $bought_ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bought_ad $bought_ad)
    {
        //
    }
}
