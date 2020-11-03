@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                   
                    {{$contact->created_at}}
                    <form action="{{route('update', ['id' =>$contact->id])}}" method="POST">
                        @csrf
                        氏名
                        <input type="text" name='your_name' value="{{$contact->your_name}}">
                        <br>
                        メール
                        <input type="text" name='email' value="{{$contact->email}}">
                        <br>
                        好きな犬
                        <input type="text" name='like_dog' value=" {{$contact->like_dog}}">
                        
                        <input type="submit" class="btn btn-info" value="更新する">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
