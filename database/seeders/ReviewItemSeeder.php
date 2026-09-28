<?php

namespace Database\Seeders;

use App\Models\StudyItem;
use Illuminate\Database\Seeder;

class ReviewItemSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['その他', '復習：Laravel', 'Laravelの内容を復習します。', 'まだ分からない', '未学習', null],
            ['その他', '復習：PHP',                 'PHPの基本文法や処理を復習します。',           'まだ分からない', '未学習', null],
            ['その他', '復習：HTML',                'HTMLのタグや構造を復習します。',             'まだ分からない', '未学習', null],
            ['その他', '復習：CSS',                 'CSSのレイアウトやスタイル指定を復習します。', 'まだ分からない', '未学習', null],
            ['その他', '復習：JavaScript',          'JavaScriptの基本と画面操作を復習します。',   'まだ分からない', '未学習', null],
            ['その他', '復習：MySQL',                'MySQLの基本文法や処理を復習します。',       'まだ分からない', '未学習', null],
            ['その他', '復習：SQL',                 'SQLの基本文法や処理を復習します。',         'まだ分からない', '未学習', null],
            ['その他', '復習：Git',                 'Gitの基本文法や処理を復習します。',         'まだ分からない', '未学習', null],
            ['その他', '復習：Docker',              'Dockerの基本文法や処理を復習します。',       'まだ分からない', '未学習', null],
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