<?php
namespace App\Http\Controllers;

use App\Apartment;
use App\Feature;
use App\View;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Arr;
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
          ->orderBy('start_date', 'desc')
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

    // ↓ con il metodo index() verranno selezionati gli appartamenti entro $rad chilometri rispetto alle coordinate $lat e $lon fornite ↓
    public function searchApartments(Request $request) {
      $lat = $request['latitude'];
      $lon = $request['longitude'];
      $rad = $request['radius'];
      $beds_number = $request['beds_number'];
      $rooms_number = $request['rooms_number'];
      $lat1 = doubleval($lat);
      $lon1 = doubleval($lon);
      $rad = intval($rad);
      // ↓ $apartments conterrà tutti gli appartamenti filtrati dal database in base a $rad, $lat e $lon forniti. ↓
      $apartments = Apartment::where('visible', 1)->where('longitude', '<' , $lon1+$rad*0.01)->where('longitude', '>' , $lon1-$rad*0.01)->where('latitude', '<', $lat1 + $rad * 0.01)->where('latitude', '>', $lat1 - $rad*0.01)->get();
      // ↑ questa prima scrematura fornisce una distanza dalle coordinate selezionate con limiti leggermente maggiori del richiesto. ↑
      // ↓ $filteredApartments conterrà tutti gli appartamenti entro la distanza voluta, con precisione ottimale e ordinati discendentemente rispetto alla distanza dalla posizione fornita dall'utente ↓
      $filteredApartments = [];
      foreach($apartments as $apartment) {
        $lat2 = $apartment['latitude'];
        $lon2 = $apartment['longitude'];
        $p = 0.017453292519943295;
        $a = 0.5 - cos(($lat2 - $lat1) * $p)/2 +
        cos($lat1 * $p) * cos($lat2 * $p) *
        (1 - cos(($lon2 - $lon1) * $p))/2;
        $result = 12742 * asin(sqrt($a));
        if ($result <= $rad) {
          $result = round($result, 2);
          $apartment->distance = $result;
          $filteredApartments[] = $apartment;
        }
        $filteredApartments = array_values(Arr::sort($filteredApartments, function ($value) {
        return $value['distance'];
        }));
      }
      $data = [
        'filteredApartments'=>$filteredApartments,
        'latitude' => $lat,
        'longitude' => $lon,
        'radius' => $rad,
        'beds_number' => $beds_number,
        'rooms_number' => $rooms_number,
        'features' => Feature::all(),
        'selected_features' =>$request['features'],
      ];
      return view('apartments.index', $data);
    }
}
