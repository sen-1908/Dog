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
                    {{$contact->id}}
                    {{$contact->your_name}}
                    {{$contact->like_dog}}
                    {{$contact->created_at}}
                    <form action="{{route('edit', ['id' =>$contact->id])}}" method="GET">
                        @csrf
                        
                        <input type="submit" class="btn btn-info" value="変更">
                    </form>
                    <form action="{{route('destroy' , ['id' => $contact->id])}}" method="POST" id="delete_{{$contact->id}}">
                    @csrf 
                    <a href="#" class="btn btn-danger" date-id="{{ $contact->id}}" onclick="deletePost(this);">削除</a>
                    <input type="submit" class="btn btn-danger" value="削除">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deletePost(e) {
        'use strict';
        if (confirm('本当によろしい？')) {
            document.getElementById('delete_'+ e.dataset.id).submit();
        }
    }
</script>
@endsection
