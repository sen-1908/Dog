<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $fillable = ['post_id' , 'user_id','comment'];
    
    public function posts()
    {
        return $this->hasMany('App\Models\PostModel');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
