@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">ユーザ</div>
          <div class="panel-body">
            <div class="form-group">
              <label for="title">名前</label>
              <div>{{$user->name}}</div>
            </div>
            <div class="form-group">
              <label for="title">メールアドレス</label>
              <div>{{$user->email}}</div>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="text-center">
      <a href="{{route('users.edit', [ 'user' => $user ])}}">編集</a>
    </div>
  </div>
@endsection