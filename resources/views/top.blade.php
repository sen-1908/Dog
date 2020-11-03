<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('DogImage/title.jpg') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

       
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <img class="home-img" src="{{ asset('DogImage/title.jpg') }}" class="thumbnail" alt="">
                    @if (Route::has('login'))
                <div class="title-button links">
                    @auth
                        <a class="btn title-btn" href="{{ route('index') }}">みんなの投稿を見る</a>
                    @else
                        <a class="btn title-btn" href="{{ route('login') }}">ログインする</a>

                        @if (Route::has('register'))
                            <a class="btn title-btn" href="{{ route('register') }}">新規登録する</a>
                        @endif
                    @endauth
                </div>
            @endif
                </div>
                <div class="explain">
                    <div class="explain-contents" >
                       <div class="explain-content" >
                           <div class="explain-img">
                             <img class="title-img" src="{{ asset('DogImage/about.jpg') }}" class="top-title" alt="">  
                           </div>
                           <div class="explain-sentence">
                           <div class="explain-title">
                                <h3>OneDayとは</h3>
                           </div>
                           <div class="explain-text">
                            <p>OneDayとは犬好きな人のために</p>
                            <p>自分の愛犬をみんなに見てもらうために</p>
                            <p>そんな人のために作ったサービスです！</p>
                           </div>
                           </div>
                       </div> 
                  
                       <div class="explain-content-2" >
                           <div class="explain-img">
                             <img class="title-img" src="{{ asset('DogImage/use-title.jpg') }}" class="top-title" alt="">  
                           </div>
                           <div class="explain-sentence">
                           <div class="explain-title">
                                <h3>OneDayの簡単な投稿機能</h3>
                           </div>
                           <div class="explain-text">
                            <p>使ってみなきゃわからない簡単な仕様</p>
                            <p>ボタンひとつで投稿！</p>
                            <p>ランキング、今日のおすすめが見える？</p>
                           </div>
                           </div>
                       </div> 

                       <div class="explain-content" >
                           <div class="explain-img">
                             <img class="title-img" src="{{ asset('DogImage/easy.jpg') }}" class="top-title" alt="">  
                           </div>
                           <div class="explain-sentence">
                           <div class="explain-title">
                                <h3>OneDayのプロフィール設定</h3>
                           </div>
                           <div class="explain-text">
                            <p>自分の愛犬をプロモート</p>
                            <p>難しい設定はひとつもなし！</p>
                            <p>誰でも簡単に利用できます</p>
                           </div>
                           </div>
                       </div> 
                  
                    </div>
                    </div>
                </div>
                <div class="footer">
                    
                </div>
            </div>
        </div>
    </body>
</html>
