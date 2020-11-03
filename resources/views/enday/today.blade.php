@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- <div class="col-md-8"> -->
            <div class="new-btn">
                <a href="{{route('index')}}" class="btn">新しいわんこ</a>
            </div>
            <div class="today-btn">
                <a href="{{route('today')}}" class="btn">今日のわんこ</a>
            </div>
            <div class="rank-btn">
                <a href="{{route('rank')}}" class="btn">人気のわんこ</a>
            </div>
        <div class="card" style="width: 100%;">
            <div class="wrapper">
                    
                <div class="tweet-wrapper"> 
                    @foreach($tweets as $tweet)            
                    <div class="tweet-tweet" style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
                    <div class="tweet-user">
                            <div class="tweet-thum">
                            @if(!empty($authUser->thumbnail))
                                <img src="/storage/user/{{ $tweet->user->thumbnail }}" class="thumbnail">
                                @else
                                <img src="{{ asset('DogImage/book_inu_yomu.png') }}" class="thumbnail" alt="">
                                @endif
                            </div>
                            <div class="tweet-name">
                                <a href="{{route('user.profile', ['id' => $tweet->user_id] )}}">{{ $tweet->user->name }}</a>
                            </div>
                        </div>
                        <div class="tweet-contents">
                            <div class="tweet-title">
                            <div>{{ $tweet->title }}</div>
                        </div>
                            <div class="tweet-days">
                        <div>{{ $tweet->created_at }}</div>
                    </div>
                            <div class="tweet-img">
                                @if($tweet->image_url)
                                <img src="{{ asset('storage/post/'.$tweet->image_url) }}" class="tweet-main">
                                @else
                                    <p>--------</p>
                                @endif
                            </div>
                         
                            <div class="tweet-content">
                            <div>{{ $tweet->tweet }}</div>
                        </div>
                        </div>
                        <div class="likecom">
                        <div>
                            <!-- likeコマンド -->
                        @if($tweet->is_liked_by_auth_user())
                            <!-- <a href="{{ route('reply.unlike', ['id' => $tweet->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $tweet->likes->count() }}</span></a> -->
                            <a href="{{ route('reply.unlike', ['id' => $tweet->id]) }}" class="btn btn-success btn-sm">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('reply.like', ['id' => $tweet->id]) }}" class="btn btn-secondary btn-sm">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                </svg>
                            </a>
                        @endif
                        {{ $tweet->likes->count() }}
                        </div>
                        <div class="comments">
                            <form action="{{route('comment',['id' => $tweet->id]) }}" method="get">
                                @csrf
                                <input name="comment" id="" cols="30" rows="10">
                                </input>
                                <button type="submit"　class="comment-sub">コメント</button>
                            </form>
                            <div class="comment-contents">
                                @foreach($com as $comment)
                                @if( $comment->post_id===$tweet->id)
                            <div class="comment-people">
                                <div class="comment-img">
                            @if(!empty($authUser->thumbnail))
                                <img class="comment-thum" src="/storage/user/{{$comment->user->thumbnail }}" class="file_name">
                                @else
                                <img class="comment-thum" src="{{ asset('DogImage/book_inu_yomu.png') }}" class="thumbnail" alt="">
                                @endif
                            </div>
                            <div class="comment-name">
                            <a href="{{route('user.profile', ['id' => $tweet->user_id] )}}">{{ $comment->user->name}}</a>
                            </div>
                            </div>
                            <div class="comment-comment">
                                {{ $comment->comment}}
                                </div>
                                @endif 
                                
                                @endforeach
                           
                            </div>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
        </div>
    </div>
</div>
</div>
@endsection
