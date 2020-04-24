<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bought_ad extends Model
{
    protected $fillable = [
        'ad_id',
        'apartment_id',
        'start_date',
        'end_date'
    ];

    // public function apartments()
    // {
    //     return $this->hasMany('App\Apartment');
    // }
    public function apartment()
    {
        return $this->belongsTo('App\Apartment');
    }
    public function ad()
    {
        return $this->belongsTo('App\Ad');
    }
}
