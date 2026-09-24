@extends('layouts.app')

@section('title', '学習項目の新規登録')

@section('content')
<header class="page-head">
  <div>
    <h1>学習項目の新規登録</h1>
    <p class="lead">学習項目の内容を入力してください。</p>
  </div>
</header>

<form method="POST" action="{{ route('study-items.store') }}">
  @csrf
  <section class="panel form-panel">
    @include('study_items._form')
  </section>

  <div class="form-actions">
    <a class="btn" href="{{ route('study-items.index') }}">キャンセル</a>
    <button type="submit" class="btn btn-primary">登録する</button>
  </div>
</form>
@endsection
