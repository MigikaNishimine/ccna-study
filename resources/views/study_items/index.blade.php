@extends('layouts.app')

@section('title', '学習項目一覧')

@section('content')
<header class="page-head">
  <div>
    <h1>学習項目一覧</h1>
    <p class="lead">CCNAの学習項目を登録・管理できます。</p>
  </div>
  <a class="btn btn-primary" href="{{ route('study-items.create') }}">＋ 新規登録</a>
</header>

<section class="panel">
  <form method="GET" action="{{ route('study-items.index') }}" class="filters">
    <input type="search" name="q" value="{{ request('q') }}" placeholder="キーワードで検索" aria-label="キーワード">

    <select name="category" aria-label="分野">
      <option value="">分野：すべて</option>
      @foreach (\App\Models\StudyItem::CATEGORIES as $category)
        <option value="{{ $category }}" @selected(request('category') === $category)>{{ $category }}</option>
      @endforeach
    </select>

    <select name="status" aria-label="ステータス">
      <option value="">ステータス：すべて</option>
      @foreach (array_keys(\App\Models\StudyItem::STATUSES) as $status)
        <option value="{{ $status }}" @selected(request('status') === $status)>{{ $status }}</option>
      @endforeach
    </select>

    <button type="submit" class="btn btn-primary">検索</button>
    @if (request()->hasAny(['q', 'category', 'status']))
      <a class="btn" href="{{ route('study-items.index') }}">条件をクリア</a>
    @endif
  </form>

  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th>No.</th><th>分野</th><th>学習項目</th><th>理解度</th><th>ステータス</th><th>最終学習日</th><th>操作</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($items as $item)
          <tr>
            <td>{{ $items->firstItem() + $loop->index }}</td>
            <td>{{ $item->category }}</td>
            <td>{{ $item->title }}</td>
            <td><span class="badge {{ $item->understanding_class }}">{{ $item->understanding }}</span></td>
            <td><span class="badge {{ $item->status_class }}">{{ $item->status }}</span></td>
            <td>{{ $item->last_studied_at?->format('Y/m/d') ?? '-' }}</td>
            <td>
              <div class="actions">
                <a class="btn btn-sm" href="{{ route('study-items.show', $item) }}">詳細</a>
                <a class="btn btn-sm" href="{{ route('study-items.edit', $item) }}">編集</a>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" class="empty">
            条件に合う学習項目がありません。条件を変えるか、新しく登録してください。
          </td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{ $items->links('pagination.custom') }}
</section>
@endsection
