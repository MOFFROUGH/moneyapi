<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Moneys extends Model{
  protected $fillable = [
      'user_id','moneys_id'
  ];



}
