<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['post_model_id' , 'user_id'];

    public function post()
    {
        return $this->belongsTo('App\Models\PostModel');
    }
    public function user()
  {
    return $this->belongsTo('App\User');
  }
  
}
