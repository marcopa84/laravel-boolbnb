<?php

namespace App\Http\Controllers\Registered;

use App\Ad;
use App\Apartment;
use Illuminate\Support\Facades\Auth;

use App\Bought_ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('registered.boughtads.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Apartment $apartment)
    {
        return view('registered.boughtads.create', compact('apartment'));
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
