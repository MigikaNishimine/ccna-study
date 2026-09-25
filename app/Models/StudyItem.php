<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyItem extends Model
{
    // 分野（自由に増減できます）
    public const CATEGORIES = [
        'ネットワークの基礎',
        'Cisco機器の基本知識',
        'Layer1：物理層',
        'Layer2：データリンク層',
        'Layer3：ネットワーク層',
        'Layer4：トランスポート層',
        'Layer7：アプリケーション層',
        'ネットワークの技術',
    ];

    // 理解度（4段階）と、画面表示用のCSSクラス
    public const UNDERSTANDINGS = [
        'まだ分からない' => 'u1',
        '少し分かる'     => 'u2',
        'だいたい分かる' => 'u3',
        '人に説明できる' => 'u4',
    ];

    // ステータス（3種類）と、画面表示用のCSSクラス
    public const STATUSES = [
        '未学習' => 's1',
        '学習中' => 's2',
        '完了'   => 's3',
    ];

    protected $fillable = [
        'category',
        'title',
        'content',
        'understanding',
        'status',
        'last_studied_at',
    ];

    protected $casts = [
        'last_studied_at' => 'date',
    ];

    public function getUnderstandingClassAttribute(): string
    {
        return self::UNDERSTANDINGS[$this->understanding] ?? '';
    }

    public function getStatusClassAttribute(): string
    {
        return self::STATUSES[$this->status] ?? '';
    }
}
