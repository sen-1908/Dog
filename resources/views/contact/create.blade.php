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

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error}}  </li>
                            @endforeach
                        </ul>
                    </div>

                    @endif
                    create
                    <form action="{{ route('store')}}" method="POST">
                        @csrf
                        氏名
                        <input type="text" name='your_name'>
                        <br>
                        メールアドレス
                        <input type="text" name='email'>
                        <br>
                        好きな犬
                        <input type="text" name='like_dog'>
                        <br>
                        <input type="submit" class="btn btn-info" value="登録">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
