<?php

namespace App\Http\Controllers\Registered;

use App\Ad;
use App\Apartment;
use Illuminate\Support\Facades\Auth;

use App\Bought_ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

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


    public function validationForm(Request $request)
    {
        $validateRules = [
            'ad_id' => 'required|integer|exists:App\Ad,id',
            'apartment_id' => 'required|integer|exists:App\Apartment,id',
            'start_date' => 'required|date|after:yesterday'
        ];
        $request->validate($validateRules);
        $dataRequest = $request->all();
    

        $bought_ad = new Bought_ad;
        $hours = Ad::where('id', $dataRequest['ad_id'])->first()->hours;
        $end_date = Carbon::createFromDate($dataRequest['start_date'])->add($hours, 'hour');
        $dataRequest['end_date'] = $end_date;
        $bought_ad->fill($dataRequest);

        $data = [
            'bought_ad' => $bought_ad,
            'amount' => Ad::where('id', $dataRequest['ad_id'])->first()->price,
        ];

        return redirect()->action('PaymentController@form')->with('checkoutData', $data);
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
        $saved = $bought_ad->save();

        if (!$saved) {
            return redirect()->back()->with('error', 'Errore durante l\'inserimento della sponsorizzazione.');
        }

        return redirect()->route('registered.apartments.ads.index')->with('message', 'Sponsorizzazione inserita correttamente.');
        
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
