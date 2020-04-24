<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'rooms_number',
        'beds_number',
        'bathrooms_number',
        'size',
        'address',
        'latitude',
        'longitude',
        'featured_image',
        'price',
        'visible'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function messages() {
        return $this->hasMany('App\Message');
    }
    public function images() {
        return $this->hasMany('App\Image');
    }
    public function bought_ads()
    {
        return $this->hasMany('App\Bought_ad');
    }
    public function views()
    {
        return $this->hasMany('App\View');
    }
    public function features() {
        return $this->belongsToMany('App\Feature');
    }
}
