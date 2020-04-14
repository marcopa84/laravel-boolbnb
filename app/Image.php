<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'id_apartment',
        'url_image'
    ];

    public function apartment()
    {
        return $this->belongsTo('App\Apartment');
    }
}
