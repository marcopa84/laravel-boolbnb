<?php
namespace App\Http\Controllers;

use App\Apartment;
use App\View;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // qui manderemo solo gli sponsorizzati per la homepage
        $now = Carbon::now();
        $apartments_ads = DB::table('apartments')
        ->join('bought_ads', 'apartments.id', '=', 'bought_ads.apartment_id')
        ->select('*')
        ->where([
            ['start_date', '<=', $now],
            ['end_date', '>=', $now],
        ])
        ->limit(6)
        ->get();
        $data = [
            'apartments_ads' => $apartments_ads,
        ];
        return view('index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        View::create([
            'apartment_id' => $apartment->id,
            'date' => Carbon::now(),
        ]);
        return view('apartments.show', compact('apartment'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}