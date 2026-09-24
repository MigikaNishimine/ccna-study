<?php

namespace Database\Seeders;

use App\Models\StudyItem;
use Illuminate\Database\Seeder;

class StudyItemSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['ネットワーク基礎', 'OSI参照モデル',     'OSI参照モデルの7つの階層について学習します。',           'だいたい分かる', '学習中', '2025-09-15'],
            ['IPアドレス',       'IPv4',              'IPv4アドレスの構成とクラス、サブネットマスクを学習します。', '少し分かる',     '学習中', '2025-09-14'],
            ['ルーティング',     'スタティックルート', '静的ルートの設定方法と確認コマンドを学習します。',       'まだ分からない', '未学習', null],
            ['セキュリティ',     'ACL',               'アクセスコントロールリストの種類と設定方法を学習します。', 'だいたい分かる', '学習中', '2025-09-12'],
            ['スイッチング',     'VLAN',              'VLANの役割とトランクポートの設定を学習します。',           '人に説明できる', '完了',   '2025-09-10'],
        ];

        foreach ($rows as [$category, $title, $content, $understanding, $status, $date]) {
            StudyItem::create([
                'category'        => $category,
                'title'           => $title,
                'content'         => $content,
                'understanding'   => $understanding,
                'status'          => $status,
                'last_studied_at' => $date,
            ]);
        }
    }
}
