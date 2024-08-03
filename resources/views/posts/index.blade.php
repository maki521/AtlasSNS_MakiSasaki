@extends('layouts.login')

@section('content')
<div class ="container">
  <!-- /topに値を送る -->
  {!! Form::open(['url' => '/top']) !!}
  {{ Form::token() }}
  <div class="form-group">
    <img src="{{ asset('images/icon1.png') }}" alt="アイコン">
    {{Form::input('text','newPost',null,['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください'])}}
    <button type="submit" class="btn btn-success pull-right"><img src="images/post.png" alt="送信"></button>
  </div>
  {!! Form::close() !!}
</div>
<div>
  @foreach($list as $list)
  <tr>
    <td>{{ $list->user_id}}</td>
    <td>{{ $list->post }}</td>
    <td>{{ $list->create_at }}</td>
  </tr>
  @endforeach
</div>
@endsection
