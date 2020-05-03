<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  public $increment = false;
  protected $table = "carts";
  protected $keyType = 'string';
  protected $primaryKey = 'cart_code';
  protected $fillable = [
      'cart_code',
      'ad_id',
      'apartment_id',
      'start_date',
      'end_date'
  ];
  public function apartment()
  {
      return $this->belongsTo('App\Apartment');
  }
  public function ad()
  {
      return $this->belongsTo('App\Ad');
  }

}
