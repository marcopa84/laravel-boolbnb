<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = [
        'id_apartment',
        'date'
    ];

    public function apartment() {
        return $this->belongsTo('App\Apartment');
    }
}
