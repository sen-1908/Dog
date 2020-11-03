@extends('layouts.app')
@section('title','ユーザー情報')
@section('content')
<div class="container">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th></th>
        <th>名前</th>
        <th>メールアドレス</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div>
            @if(!empty($authUser->thumbnail))
            <img src="/storage/user/{{ $authUser->thumbnail }}" class="thumbnail">
            @else
            <img src="{{ asset('DogImage/book_inu_yomu.png') }}" class="thumbnail" alt="">
            @endif
          </div>
        </td>
        <td>{{ $authUser->name }}</td>
        <td>{{ $authUser->email }}</td>
        <td>
          <a href="{{ route('user.edit') }}" class="btn btn-primary btn-sm">編集</a>
        </td>
      </tr>

    </tbody>
  </table>
  <!-- Slider main container -->
  <div class="user-container">
    <div class="user-wrapper">
      <div class="title-bar">
        <a class="user-title" class="btn" href="{{route('user.index')}}">
          プロフィール
        </a>
        
        <a class="user-title" href="{{route('my_post')}}">
          自分の投稿
        </a>
        </div>

        <div class="wrapper">
          <form action="{{route('history')}}" method="get">
            @csrf
            <button type="submit" class="tweet-btn btn">
              プロフィールの更新
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
            </svg>
          </button>
        </form>
            <!-- もし更新がある場合 -->
            <div class="history-contents">
              @foreach($history as $hist)
              @if($hist->user_id === $authUser->id)
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
              
              <form action="{{route('user.destroy' , ['id' => $hist->id])}}" method="POST" id="delete_{{$hist->id}}">
                    @csrf 
                    <button type="submit" class="btn btn-danger" value="削除">このプロフィールを削除する</button>
                    </form>
              @endif
              @endforeach
              
            </div>
            <!-- 更新がない場合のサンプル -->
        </div>
      
    
    </div>

    <div class="swiper-pagination"></div>
  </div>
</div>

@endsection

