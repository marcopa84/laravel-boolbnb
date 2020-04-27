<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'description',
        'hours',
        'price'
    ];

    public function bought_ads()
    {
        return $this->hasMany('App\Bought_ad');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
