<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHistoryModel extends Model
{
  protected $fillable = 
  [
      'user_id','name', 'birth_year' ,'myself', 'kind_dog', 'gender', 'img_url', 
  ];



    public function user()
    {
      return $this->belongsTo('App\User');
    }
    
}
