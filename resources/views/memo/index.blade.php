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
                    <!-- <a href="{{route('memo.create')}}">新規登録</a> -->
                    <form action="{{route('memo.create')}}" method="GET">
                    <button type="submit" class="btn btn-primary">
                    新規登録
                    </button>
                    </form>

                    <form  method="GET" action="{{route('memo.index')}}" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="検索" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
                        </form>


                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">氏名</th>
                            <th scope="col">メモ</th>
                            <th scope="col">登録日時</th>
                            <th scope="col">編集</th>
                            </tr>
                        </thead>
                        <tbody>

                    @foreach($memos as $memo)
                    <tr>
                    <th>{{$memo->name}}</th>
                    <td>{{$memo->comment}}</td>
                    <td>{{$memo->created_at}}</td>
                    <td><a href="{{route('memo.show',['id' => $memo->id])}}">編集</a></td>
                    </tr>
                    @endforeach
                        </tbody>
                        </table>
                        {{$memos->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
