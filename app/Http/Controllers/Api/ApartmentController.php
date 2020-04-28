<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Feature;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ApartmentController extends Controller
{
  // ↓ con il metodo index() verranno selezionati gli appartamenti entro $rad chilometri rispetto alle coordinate $lat e $lon fornite ↓
  public function index(Request $request) {
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
