<?php

namespace App\Http\Controllers\Registered;

use App\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    private $validateRules;

    public function __construct()
    {
        $this->validateRules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rooms_number' => 'required|integer',
            'beds_number' => 'required|integer',
            'bathrooms_number' => 'required|integer',
            'size' => 'required|integer',
            'address' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'featured_image' => 'image',
            'price' => 'integer',
            'visible' => 'boolean'
        ];
    }


    // //////////////////////////////////////////////////
    // I N D E X
    // //////////////////////////////////////////////////

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::where('id_user', Auth::id())->get();
        return view('registered.apartments.index', compact('apartments'));
    }

    // //////////////////////////////////////////////////
    // C R E A T E
    // //////////////////////////////////////////////////

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registered.apartments.create');
    }

    // //////////////////////////////////////////////////
    // S T O R E
    // //////////////////////////////////////////////////

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->all();
        $request->validate($this->validateRules);



      

    }

    // //////////////////////////////////////////////////
    // S H O W
    // //////////////////////////////////////////////////

    /**
     * Display the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('registered.apartments.show', compact('apartment'));
    }

    // //////////////////////////////////////////////////
    // E D I T
    // //////////////////////////////////////////////////

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

    // //////////////////////////////////////////////////
    // U P D A T E
    // //////////////////////////////////////////////////

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

    // //////////////////////////////////////////////////
    // D E S T R O Y
    // //////////////////////////////////////////////////

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
