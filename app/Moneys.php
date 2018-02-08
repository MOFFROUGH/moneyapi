<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Moneys extends Model{
  protected $fillable = [
      'name','description','amount','paid','done','shared','user_id'
  ];
public function user()
{
  return $this->belongsTo(User::class);
}


}
