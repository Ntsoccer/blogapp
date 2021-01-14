@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @foreach($blogs as $blog)
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">{{$blog->title}}</h5>
          <p class="card-text">{{$blog->content}}</p>
          <hr>
          <p><span>投稿者：</span>{{$blog->user->name}}</p>
          @if($blog->user_id === Auth::user()->id)
          <form method="GET" action="{{route('blog.edit',['id'=>$blog->id])}}">
            @csrf
            <input class="btn btn-info" type="submit" value="編集する">
          </form>
          <form method="POST" action="{{route('blog.destroy',['id'=>$blog->id])}}">
            @csrf
            <input class="btn btn-danger" type="submit" value="削除する">
          </form>
          @endif
          @if($blog->users()->where('user_id',Auth::id())->exists())
          <form method="POST" action="{{ route('unfavorites', $blog) }}">
            @csrf
            <input type="hidden" name="post_id" value="{{$blog->id}}">
            <button type="submit"><i class="fas fa-heart"></i></button>{{$blog->users()->count()}}
          </form>
          @else
          <form method="POST" action="{{ route('favorites', $blog) }}">
            @csrf
            <input type="hidden" name="post_id" value="{{$blog->id}}">
            <button type="submit"><i class="far fa-heart"></i></button>{{$blog->users()->count()}}
          </form>
          @endif
        </div>
      </div>
      <br>
      @endforeach
    </div>
  </div>
</div>
@endsection