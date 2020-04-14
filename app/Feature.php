<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'description'
    ];

    public function apartments()
    {
        return $this->belongsToMany('App\Apartment');
    }
}
