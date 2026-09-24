<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudyItemRequest;
use App\Models\StudyItem;
use Illuminate\Http\Request;

class StudyItemController extends Controller
{
    // 一覧（検索・絞り込み・ページ送り）
    public function index(Request $request)
    {
        $items = StudyItem::query()
            ->when($request->filled('q'), function ($query) use ($request) {
                $keyword = $request->input('q');
                $query->where(function ($q) use ($keyword) {
                    $q->where('title', 'like', "%{$keyword}%")
                      ->orWhere('content', 'like', "%{$keyword}%");
                });
            })
            ->when($request->filled('category'), fn ($q) => $q->where('category', $request->input('category')))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->input('status')))
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('study_items.index', compact('items'));
    }

    // 新規登録画面
    public function create()
    {
        return view('study_items.create');
    }

    // 登録処理（バリデーションは StudyItemRequest が実行）
    public function store(StudyItemRequest $request)
    {
        StudyItem::create($request->validated());

        return redirect()
            ->route('study-items.index')
            ->with('success', '学習項目を登録しました。');
    }

    // 詳細画面
    public function show(StudyItem $studyItem)
    {
        return view('study_items.show', ['item' => $studyItem]);
    }

    // 編集画面
    public function edit(StudyItem $studyItem)
    {
        return view('study_items.edit', ['item' => $studyItem]);
    }

    // 更新処理
    public function update(StudyItemRequest $request, StudyItem $studyItem)
    {
        $studyItem->update($request->validated());

        return redirect()
            ->route('study-items.show', $studyItem)
            ->with('success', '学習項目を更新しました。');
    }

    // 削除処理
    public function destroy(StudyItem $studyItem)
    {
        $studyItem->delete();

        return redirect()
            ->route('study-items.index')
            ->with('success', '学習項目を削除しました。');
    }
}
