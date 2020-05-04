<?php

namespace App\Http\Controllers\Registered;

use App\Apartment;
use App\Charts\ViewChart;
use App\Http\Controllers\Controller;
use App\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
      
      $messages= DB::table('messages')
        ->where('apartment_id', $apartment->id)
        ->whereDate('created_at', '>', today()->subMonth(2))
        ->groupBy('created_at')
        ->select(DB::raw('count(*) as messages, created_at'))
      ->get();
      
      $data = [];

      if(count($views) > 0){

        for ($i=0; $i < count($views); $i++) {
        $labelsViews[] = Carbon::createFromDate($views[$i]->date)->format('d-M-Y') ;
        $datasetViews[] = $views[$i]->views;
        };
        $chartViews = new ViewChart;
        $chartViews->title('Visualizzazioni degli ultimi due mesi dell\'appartamento: '.$apartment->title, 20, '#666', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
        $chartViews->labels($labelsViews);
        $chartViews->dataset('Visualizzazioni giornaliere', 'line', $datasetViews)->options([
          'backgroundColor' => 'rgba(20,109,112, .4)',
        ]);
        $data += ['views' => $chartViews];
      }

      if (count($messages) > 0) {

        for ($i = 0; $i < count($messages); $i++) {
        $labelsMessages[] = Carbon::createFromDate($messages[$i]->created_at)->format('d-M-Y');
        $datasetMessages[] = $messages[$i]->messages;
        };
        $chartMessages = new ViewChart;
        $chartMessages->title('Messaggi ricevuti negli ultimi due mesi per l\'appartamento : ' . $apartment->title, 20, '#666', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
        $chartMessages->labels($labelsMessages);
        $chartMessages->dataset('Messaggi ricevuti giornalieri', 'bar', $datasetMessages)->options([
          'backgroundColor' => 'rgba(20,109,112, .4)',
        ]);

        $data += ['messages' => $chartMessages];
      }
      
     /*  $data = [
        'views' => $chartViews,
        'messages' => $chartMessages
      ]; */
      return view('registered.apartments.views.show', $data);
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
