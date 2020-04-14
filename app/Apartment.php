<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'id_user',
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
}
