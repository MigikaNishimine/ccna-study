<?php

namespace App\Http\Requests;

use App\Models\StudyItem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudyItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category'        => ['required', Rule::in(StudyItem::CATEGORIES)],
            'title'           => ['required', 'string', 'max:100'],
            'content'         => ['required', 'string', 'max:1000'],
            'understanding'   => ['required', Rule::in(array_keys(StudyItem::UNDERSTANDINGS))],
            'status'          => ['required', Rule::in(array_keys(StudyItem::STATUSES))],
            'last_studied_at' => ['nullable', 'date'],
        ];
    }

    public function attributes(): array
    {
        return [
            'category'        => '分野',
            'title'           => '学習項目',
            'content'         => '学習内容',
            'understanding'   => '理解度',
            'status'          => 'ステータス',
            'last_studied_at' => '最終学習日',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attributeを入力（選択）してください。',
            'max'      => ':attributeは:max文字以内で入力してください。',
            'in'       => ':attributeの選択内容が正しくありません。',
            'date'     => ':attributeは日付の形式で入力してください。',
        ];
    }
}
