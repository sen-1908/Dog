
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    index
                    <form method="GET" action="{{ route('create') }}">
                    <button type="submit" class=" btn btn-primary">
                        新規登録
                    </button>
                    </form>
                    <form class="form-inline" method="GET" action=" {{route('index')}} ">
                        <input class="form-control mr-sm-2" type="search" placeholder="検索" aria-label="Search" name='search'>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
                    </form>

                    
                    <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">DOG</th>
                        <th scope="col">Day</th>
                        <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>

                            @foreach($contacts as $contact) 
                            <tr>
                        <th>{{ $contact->id}}</th>
                        <td>{{ $contact->your_name}}</td>
                        <td> {{ $contact->like_dog}}</td>
                        <td>{{ $contact->created_at}}</td>
                        <td><a href="{{route('show', ['id'=> $contact->id])}}">Details </a></td>
                        </tr>  
                        @endforeach
                    </tbody>
                    </table>

                    {{ $contacts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
