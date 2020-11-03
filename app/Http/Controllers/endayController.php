<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\PostModel;
use App\Calendar\CalendarView;
use App\Models\Like;
use App\Models\CommentModel;
use Illuminate\Support\Facades\DB;
use App\User;


class endayController extends Controller
{

    public function __construct()
    {
      $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
  
  
   /**
    * 引数のIDに紐づくリプライにLIKEする
    *
    * @param $id リプライID
    * @return \Illuminate\Http\RedirectResponse
    */
    public function like($id)
    {
      Like::create([
        'post_model_id' => $id,
        'user_id' => Auth::id(),
      ]);
  
      session()->flash('success', 'You Liked the Reply.');
      return back();
    }
  
    /**
     * 引数のIDに紐づくリプライにUNLIKEする
     *
     * @param $id リプライID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unlike($id)
    {
      $like = Like::where('post_model_id', $id)->where('user_id', Auth::id())->first();
      $like->delete();
  
      session()->flash('success', 'You Unliked the Reply.');
  
      return back();
    }
  
    public function index(Request $request)
    {
      
     
    

      $search = $request->input('search');
      $query =  PostModel::latest();
      $query2 = User::latest();
      // もしキーワードがあったら

      
      if($search !== null) {
          // 全角を半角に
          $search_spilit = mb_convert_kana($search, 's');
          // 空白で区切る
          $search_spilit2 = preg_split('/[\s]+/',$search_spilit,-1,PREG_SPLIT_NO_EMPTY);
          // 単語をループで
          foreach($search_spilit2 as $value) {
              $query->where('title', 'like', '%'.$value.'%');
           
            
          }
      };

    
       $com = CommentModel::latest()
       ->orderBy('created_at', 'desc')
       ->paginate(5);
       $authUser = Auth::user();


   
       $query->orderBy('created_at', 'desc');
       $tweets = $query->paginate(20);
    
       $param = [
         'com' => $com,
         'authUser' =>$authUser,
       ];
      //  dd($tweets->user);

      
     
        return view('enday.index', $param,compact('tweets'));

    }



    public function PostTweet(Request $request)
    {   
              
      
        $validator = $request->validate([
            'tweet' =>['required', 'string','max:280'],
            'title' =>['required'],
          
            'image_url' =>['required']
        ]);
        //保存するファイルに名前をつける    
        $uploadfile = $request->file('image_url');

        if(!empty($uploadfile)){
          $image_name = $request->file('image_url')->hashName();
          $request->file('image_url')->storeAs('public/post', $image_name);
        }

        PostModel::create([ // tweetテーブルに入れるよーっていう合図
            'user_id' => Auth::user()->id, // Auth::user()は、現在ログインしている人（つまりツイートしたユーザー）
            'title' => $request->title,
            'tweet' => $request->tweet, // ツイート内容
            'image_url' => $image_name, //今回追加

            ]);
            // User::where('id',$request->user_id);

            return redirect('enday/index'); 
        }


public function active()
    {
        return view('enday.active');

    }
public function today()
    {
      $tweets = PostModel::inRandomOrder()->limit(1)->get();
      $com = CommentModel::latest()
      ->orderBy('created_at', 'desc')
      ->paginate(5);
       $authUser = Auth::user();

    
       $param = [
         'com' => $com,
         'authUser' =>$authUser,
       ];

      
     
        return view('enday.today', $param,compact('tweets'));


    }

public function rank()
    {

      
      $tweets = PostModel::select('post_models.*')
      ->withCount('likes')
       ->orderby('likes_count', 'desc')
       ->paginate(10);
       $com = CommentModel::latest()
       ->orderBy('created_at', 'desc')
       ->paginate(5);
       $authUser = Auth::user();

    
       $param = [
         'com' => $com,
         'authUser' =>$authUser,
       ];

      
     
        return view('enday.rank', $param,compact('tweets'));


    }
    public function profile()
    {
    
        
        return view('enday.mypage/profile');

    }
    public function profileEdit()
    {
     
        return view('enday.mypage/edit');

    }
    public function profileUpdate()
    {
       
    }
    public function new()
    {
        return view('enday.new');

    }
    public function comment($id, Request $request){
      
      $validator = $request->validate([
        'comment' =>['required', 'string','max:280'],
        
    ]);

        if(!empty($request)){
         
        CommentModel::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
          ]);
          return redirect()->back();
        }

        
    }





















};
