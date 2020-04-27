<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public $increment = false;
  protected $table = "orders";
  protected $keyType = 'string';
  protected $primaryKey = 'order_code';
  protected $fillable = [
      'order_code',
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
