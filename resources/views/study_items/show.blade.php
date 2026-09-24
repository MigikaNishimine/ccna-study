@extends('layouts.app')

@section('title', $item->title)

@section('content')
<a class="back" href="{{ route('study-items.index') }}">← 一覧に戻る</a>

<section class="panel form-panel">
  <div class="detail-head">
    <div>
      <h2>{{ $item->title }}</h2>
      <span class="tag">{{ $item->category }}</span>
    </div>
    <span class="badge {{ $item->status_class }}">{{ $item->status }}</span>
  </div>

  <dl style="margin:0">
    <div class="detail-row">
      <dt>学習内容</dt>
      <dd>{{ $item->content }}</dd>
    </div>
    <div class="detail-row">
      <dt>理解度</dt>
      <dd><span class="badge {{ $item->understanding_class }}">{{ $item->understanding }}</span></dd>
    </div>
    <div class="detail-row">
      <dt>ステータス</dt>
      <dd><span class="badge {{ $item->status_class }}">{{ $item->status }}</span></dd>
    </div>
    <div class="detail-row">
      <dt>最終学習日</dt>
      <dd>{{ $item->last_studied_at?->format('Y/m/d') ?? '-' }}</dd>
    </div>
  </dl>

  <div class="detail-actions">
    <a class="btn" href="{{ route('study-items.edit', $item) }}">編集する</a>

    <form method="POST" action="{{ route('study-items.destroy', $item) }}"
          onsubmit="return confirm('この学習項目を削除しますか？');">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">削除する</button>
    </form>
  </div>
</section>
@endsection
