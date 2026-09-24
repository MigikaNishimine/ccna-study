@extends('layouts.app')

@section('title', '学習項目の編集')

@section('content')
<header class="page-head">
  <div>
    <h1>学習項目の編集</h1>
    <p class="lead">学習項目の内容を修正できます。</p>
  </div>
</header>

<form method="POST" action="{{ route('study-items.update', $item) }}">
  @csrf
  @method('PUT')
  <section class="panel form-panel">
    @include('study_items._form', ['item' => $item])
  </section>

  <div class="form-actions">
    <a class="btn" href="{{ route('study-items.show', $item) }}">キャンセル</a>
    <button type="submit" class="btn btn-primary">更新する</button>
  </div>
</form>
@endsection
