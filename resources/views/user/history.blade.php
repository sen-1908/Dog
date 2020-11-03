@extends('layouts.app')

@section('content')
<div class="container">
      <div class="hist-pro">プロフィール設定</div>
       
            <div class="wrapper" >
                <div class="history-wrapper">
                <form action="{{route('user.post')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <p>ワンチャンのお名前</p>
                    <input class="input-name" type="text" name="name" >
                    <p>自分のワンちゃんの画像を選択してね</p>
                    
                    <input type="file" id="file" name="img_url" class="form-control">
                    <p>ワンちゃんの犬種を教えてね</p>
                    <input class="kind_dog" type="text" name="kind_dog" >
                    <p>ワンちゃんのお誕生日を選択してね</p>
                    <input class="input-birthday" type="date" name="birth_year" placeholder="誕生日">
                    <p>ワンちゃんの自己紹介</p>
                    <textarea name="myself" class="myself"></textarea> 
                    <br>  
                    <button type="submit" class="tweet-btn btn">プロフィールを追加する</button>
                </form>
            </div>

                @foreach($history as $hist)
                @if($hist->user_id === $authUser->id)
                <div class="hist">
                <div class="history-name">
                <div>{{ $hist->name}}</div>
              </div>
              <div class="history-img">
                <div>  <img src="{{ asset('storage/hist/'.$hist->img_url) }}" class="hist-img"></div>
              </div>
              <div class="history-kind">
                <div>{{ $hist->kind_dog }}</div>
              </div>
              
              <div class="history-birthday">
                <div>{{ $hist->birth_year }}</div>
              </div>
              <div class="history-myself">
                <div>{{ $hist->myself }}</div>
              </div>
              </div>
                                @endif
                @endforeach
            </div>
            <a class="return-hist btn" href="{{route('user.index')}}">戻る</a>
       
    </div>
  
@endsection
