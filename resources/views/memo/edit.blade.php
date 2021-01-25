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

                    editです
                    <form action="{{route('memo.update',['id' => $memo->id])}}" method="POST">
                    @csrf
                    氏名
                    <input type="text" name="name" value="{{$memo->name}}">
                    <br>
                    メモ
                    <textarea name="comment" cols="30" rows="5">{{$memo->comment}}</textarea>
                    <br>




                    <input class="btn btn-info" type="submit" value="更新">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
