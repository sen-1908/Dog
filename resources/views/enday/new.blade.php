@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
            <div class="wrapper" >
                <div class="new-wrapper">
                <form action="{{route('Post')}}" method="post" enctype='multipart/form-data'>
                @csrf
                <h4>投稿タイトル</h4>
                <input class="new-title" type="text" name="title" placeholder="タイトルを記入してね">
                <h4>投稿内容を書いてね</h4>
                <input class="new-contents" type="text" name="tweet" placeholder="出来事を記入してね">
                <h4>投稿画像を選択してね</h4>
                <input class="new-img" type="file" name="image_url" class="form-controller-file" id="image_url">
                <br>
                
                    <button type="submit" class="tweet-btn btn">投稿する</button>
                    @if($errors->first('tweet')) <!-- 追加 -->
                        <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">※{{$errors->first('title')}}</p>
                        <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">※{{$errors->first('tweet')}}</p>
                        <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">※{{$errors->first('image_url')}}</p>
                    @endif
                </form>
            </div>
        </div>
   
  </div>
</div>
@endsection
