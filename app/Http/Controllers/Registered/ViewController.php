<?php

namespace App\Http\Controllers\Registered;

use App\View;
use App\Apartment;
use Illuminate\Support\Facades\DB;
use App\Charts\ViewChart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {

        $views= DB::table('views')
        ->where('apartment_id', $apartment->id)
        ->whereDate('date', '>', today()->subMonth(2))
        ->groupBy('date')
        ->select(DB::raw('count(*) as views, date'))
        ->get();

        for ($i=0; $i < count($views); $i++) { 
            $labels[] = $views[$i]->date;
            $dataset[] = $views[$i]->views;
        };

        $chart = new ViewChart;
        $chart->labels($labels);
        $chart->dataset('Visualizzazioni', 'line', $dataset);

        return view('registered.apartments.views.show', compact('chart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function edit(View $view)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, View $view)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function destroy(View $view)
    {
        //
    }
}
