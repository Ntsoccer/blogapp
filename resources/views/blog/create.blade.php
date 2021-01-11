@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <form method="POST" action="{{route('blog.store')}}">
          @csrf
          @error('title')
          <div>
            {{$message}}
          </div>
          @enderror
          タイトル
          <input type="text" name="title">
          <br>
          @error('content')
          <div>
            {{$message}}
          </div>
          @enderror
          コンテンツ
          <textarea name="content"></textarea>
          <br>
          <input class="btn btn-info" type="submit" value="登録する">
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection