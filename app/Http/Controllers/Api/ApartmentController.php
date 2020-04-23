<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Apartment;
use App\Feature;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index(Request $request) {
      $data = $request->all();

      $lat = $data['latitude'];
      $lon = $data['longitude'];
      $rad = $data['radius'];

      $lat1 = doubleval($lat);
      $lon1 = doubleval($lon);
      $rad = intval($rad);

      $apartments = Apartment::where('longitude', '<' , $lon1+$rad*0.01)->where('longitude', '>' , $lon1-$rad*0.01)->where('latitude', '<', $lat1 + $rad * 0.01)->where('latitude', '>', $lat1 - $rad*0.01)->get();

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
        return $value['distance'];}));
      }
      $data = [
        'filteredApartments'=>$filteredApartments,
        'latitude' => $lat,
        'longitude' => $lon,
        'features' => Feature::all(),
      ];
      return view('apartments.index', $data);
    }
}
