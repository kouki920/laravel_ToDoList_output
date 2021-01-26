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

                    氏名&nbsp;:&nbsp;{{$memo->name}}
                    <br>
                    メモ&nbsp;:&nbsp;{{$memo->comment}}
                    <form action="{{route('memo.edit',['id' => $memo->id])}}" method="GET">
                    @csrf
                    <input class="btn btn-info" type="submit" value="変更">
                    </form>
                    <form action="{{route('memo.destroy',['id' => $memo->id])}}" method="POST" id="delete_{{$memo->id}}" >
                    @csrf
                    <a href="#" class="btn btn-danger" data-id="{{$memo->id}}" onclick="deletePost(this);">削除</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function deletePost(e){
    'use strict';
    if(confirm('本当に削除していいですか？')){
    document.getElementById('delete_' + e.dataset.id).submit();
    }
}
</script>

@endsection
