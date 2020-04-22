<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index($lat, $lon, $rad) {
      $lat1 = doubleval($lat);
      $lon1 = doubleval($lon);
      $rad = intval($rad);
      $apartments = Apartment::orderBy('longitude', 'desc')->where('longitude', '<' , $lon1+$rad*0.1)->where('longitude', '>' , $lon1-$rad*0.1)->get();
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
          $apartment->distance = $result;
          $filteredApartments[] = $apartment;
        }
      }
      return view('api.apartments.index', compact('filteredApartments'));
    }
}
