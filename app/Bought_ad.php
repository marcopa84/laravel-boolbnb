<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bought_ad extends Model
{
    protected $fillable = [
        'id_ad',
        'id_apartment',
        'start_date',
        'end_date'
    ];

    public function apartments()
    {
        return $this->hasMany('App\Apartment');
    }
    public function ad()
    {
        return $this->belongsTo('App\Ad');
    }
}
