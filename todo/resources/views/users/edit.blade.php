@extends('layout')

@section('content')
    <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">編集</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('users.edit', ['user' => $user])}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="title">名前</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
              </div>
              <div class="form-group">
                <label for="title">メールアドレス</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
        <div class="text-center">
          <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
        </div>
      </div>
    </div>
  </div>
@endsection