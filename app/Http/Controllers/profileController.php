<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\UserHistoryModel;
use App\Models\CommentModel;
use App\Models\Like;

class profileController extends Controller
{
    public function my_favorite(Request $request, $id){
        $authUser = Auth::user();
        $users = User::all();


        $tweets = PostModel::latest()
        ->orderby('created_at', 'desc')
        ->paginate(10);
        $com = CommentModel::latest()
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        // $liked = Like::all();

        
        $history = UserHistoryModel::latest()
       ->orderby('created_at', 'desc')
    //    ->limit(1)
       ->get();

        $likes= Like::latest()
        ->get();

        $mypro = User::find($id);

        $param = [
            'authUser'=>$authUser,
            'users'=>$users,
            'history'=>$history,
            'com' => $com,
            'tweets'=>$tweets,
            'likes'=>$likes,
            'user_id'=>$id,
            'myprp'=>$mypro,

        ];

        
        // dd($authUser->posts->likes);
        // UserHistoryModel::where('id',$request->user_id)->update($param);

        return view('user/my_favorite',$param);
    }
    public function my_post(Request $request){
        $authUser = Auth::user();
        $users = User::all();


        $tweets = PostModel::latest()
        ->orderby('created_at', 'desc')
        ->paginate(10);
        $com = CommentModel::all();
        // $liked = Like::all();

        
        $history = UserHistoryModel::latest()
       ->orderby('created_at', 'desc')
    //    ->limit(1)
       ->get();

        

        $param = [
            'authUser'=>$authUser,
            'users'=>$users,
            'history'=>$history,
            'com' => $com,
            'tweets'=>$tweets,
            // 'likes'=>$likes,

        ];

        
        // dd($likes);
        // UserHistoryModel::where('id',$request->user_id)->update($param);

        return view('user/my_post',$param);
    }


}