<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Payment extends Model{
  protected $table = 'payment';
  protected $fillable = [
      'amount','From'
  ];


}
