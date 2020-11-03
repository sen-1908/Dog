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

class UserController extends Controller
{
    public function index(Request $request){
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

    
        $likes= Like::all();
        

        $param = [
            'authUser'=>$authUser,
            'users'=>$users,
            'history'=>$history,
            'com' => $com,
            'tweets'=>$tweets,
            'likes'=>$likes,

        ];

        
        // dd($likes);
        // UserHistoryModel::where('id',$request->user_id)->update($param);

        return view('user.index',$param);
    }

    public function userEdit(Request $request){
        $authUser = Auth::user();
        $param = [
            'authUser'=>$authUser,
        ];
        return view('user.edit',$param);
    }

    public function userUpdate(Request $request){
        // Validator check
        $rules = [
            'user_id' => 'integer|required',
            'name' => 'required',
        ];
        $messages = [
            'user_id.integer' => 'SystemError:システム管理者にお問い合わせください',
            'user_id.required' => 'SystemError:システム管理者にお問い合わせください',
            'name.required' => 'ユーザー名が未入力です',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return redirect('/user/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $uploadfile = $request->file('thumbnail');

          if(!empty($uploadfile)){
            $thumbnailname = $request->file('thumbnail')->hashName();
            $request->file('thumbnail')->storeAs('public/user', $thumbnailname);

            $param = [
                'name'=>$request->name,
                'thumbnail'=>$thumbnailname,
            ];
          }else{
               $param = [
                    'name'=>$request->name,
               ];
          }

        User::where('id',$request->user_id)->update($param);
        return redirect(route('user.edit'))->with('success', '保存しました。');
    }
   

    public function history(){

       $history = UserHistoryModel::latest()
       ->orderby('created_at', 'desc')
    //    ->limit(1)
       ->get();
       $authUser = Auth::user();

       $param = [
        'authUser'=>$authUser,

       ];
  
        
        return view('user.history', $param,compact('history'));
    }
   
    public function userPost(Request $request)
    {
        $uploadfile = $request->file();

        if(!empty($uploadfile)){
          $image_name = $request->file('img_url')->hashName();
          $request->file('img_url')->storeAs('public/hist', $image_name);
        }

        
        UserHistoryModel::create([ 
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'kind_dog' => $request->kind_dog,
           
            'myself' => $request->myself,
            'birth_year' => $request->birth_year,
            'img_url' => $image_name,
        ]);
        // dd($request->all());
        
        return redirect('user/index')->with(['success', '投稿しました。']); 
    }

    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/');
    }
    public function destroy_profile($id)
    {
        $history = UserHistoryModel::find($id);
        $history->delete();

        return redirect('user/index');
    }

    public function destroy_post($id)
    {
        $tweet = PostModel::find($id);
        $tweet->delete();

        return redirect('user/index');
    }
    public function profile(Request $request, $id)
    {

        $authUser = Auth::user();
        $users = User::all();

        $tweets = PostModel::latest()
        ->orderby('created_at', 'desc')
        ->paginate(10);
        $com = CommentModel::all();
        $mypro = User::find($id);
        $likes = Like::all();

        
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
           'user_id'=>$id,
           'mypro'=>$mypro,
           'likes'=>$likes
        ];
        // dd($mypro);
        

        return view('user.profile', $param);
    }
}