<?php

use App\Bought_ad;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BoughtAdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 10 ; $i++) { 
            $boughtAd = New Bought_ad;
            $boughtAd->ad_id = 3;
            $boughtAd->apartment_id = $i;
            $boughtAd->transaction = 'CodiceProvaSeeder';
            $boughtAd->start_date = Carbon::now()->format('Y-m-d\\TH:i:s');
            $boughtAd->end_date = Carbon::now()->addHours(144)->format('Y-m-d\\TH:i:s');
            $boughtAd->save();

        }
    }
}
