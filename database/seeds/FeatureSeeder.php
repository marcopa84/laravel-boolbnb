<?php

use Illuminate\Database\Seeder;
use App\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [ 'Wi-Fi', 'Posto Macchina', 'Piscina', 'Portineria', 'Sauna', 'Vista Mare' ];

        for ($i=0; $i < count($features); $i++) {
            Feature::create(['description'=>$features[$i]]);
        }
    }
}
