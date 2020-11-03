<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostModel extends Model
{
    protected $fillable = 
    [
        'user_id','title',  'tweet', 'image_url'
    ];

    //いいね機能
    
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function likes()
  {
    return $this->hasMany('App\Models\Like');
  }
  public function comments()
  {
    return $this->belongsTo('App\Models\CommentModel');
  }
   /**
  * リプライにLIKEを付いているかの判定
  *
  * @return bool true:Likeがついてる false:Likeがついてない
  */
  public function is_liked_by_auth_user()
  {
    $id = Auth::id();

    $likers = array();
    foreach($this->likes as $like) {
      array_push($likers, $like->user_id);
    }

    if (in_array($id, $likers)) {
      return true;
    } else {
      return false;
    }
  }
  }
