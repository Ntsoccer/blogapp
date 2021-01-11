@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <form method="POST" action="{{route('blog.update',['id'=>$blog->id])}}">
          @csrf
          @error('title')
          <div>
            {{$message}}
          </div>
          @enderror
          タイトル
          <input type="text" name="title" value="{{$blog->title}}">
          <br>
          @error('content')
          <div>
            {{$message}}
          </div>
          @enderror
          コンテンツ
          <textarea name="content">{{$blog->content}}</textarea>
          <br>
          <input class="btn btn-info" type="submit" value="更新する">
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection