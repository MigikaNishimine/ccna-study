{{-- 新規登録・編集で共通のフォーム部品。$item は編集時のみ渡される --}}
@php $item = $item ?? null; @endphp

<div class="field">
  <label for="category">分野<span class="req">*</span></label>
  <select id="category" name="category">
    <option value="">選択してください</option>
    @foreach (\App\Models\StudyItem::CATEGORIES as $category)
      <option value="{{ $category }}" @selected(old('category', $item?->category) === $category)>{{ $category }}</option>
    @endforeach
  </select>
  @error('category')<p class="error">{{ $message }}</p>@enderror
</div>

<div class="field">
  <label for="title">学習項目<span class="req">*</span></label>
  <input type="text" id="title" name="title" maxlength="100" placeholder="例：OSI参照モデル"
         value="{{ old('title', $item?->title) }}">
  @error('title')<p class="error">{{ $message }}</p>@enderror
</div>

<div class="field">
  <label for="content">学習内容<span class="req">*</span></label>
  <textarea id="content" name="content" maxlength="1000" placeholder="学習内容を入力してください">{{ old('content', $item?->content) }}</textarea>
  @error('content')<p class="error">{{ $message }}</p>@enderror
</div>

<div class="field">
  <span class="label">理解度<span class="req">*</span></span>
  <div class="radios">
    @foreach (array_keys(\App\Models\StudyItem::UNDERSTANDINGS) as $value)
      <label>
        <input type="radio" name="understanding" value="{{ $value }}" @checked(old('understanding', $item?->understanding) === $value)>
        {{ $value }}
      </label>
    @endforeach
  </div>
  @error('understanding')<p class="error">{{ $message }}</p>@enderror
</div>

<div class="field">
  <span class="label">ステータス<span class="req">*</span></span>
  <div class="radios">
    @foreach (array_keys(\App\Models\StudyItem::STATUSES) as $value)
      <label>
        <input type="radio" name="status" value="{{ $value }}" @checked(old('status', $item?->status) === $value)>
        {{ $value }}
      </label>
    @endforeach
  </div>
  @error('status')<p class="error">{{ $message }}</p>@enderror
</div>

@if ($item)
<div class="field">
  <label for="last_studied_at">最終学習日</label>
  <input type="date" id="last_studied_at" name="last_studied_at"
         value="{{ old('last_studied_at', $item->last_studied_at?->format('Y-m-d')) }}">
  @error('last_studied_at')<p class="error">{{ $message }}</p>@enderror
</div>
@endif
