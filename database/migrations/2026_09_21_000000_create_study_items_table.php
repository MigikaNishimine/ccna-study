<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('study_items', function (Blueprint $table) {
            $table->id();                                   // id: 学習項目ID
            $table->string('category', 50);                 // 分野
            $table->string('title', 100);                   // 学習項目名
            $table->text('content');                        // 学習内容
            $table->string('understanding', 20);            // 理解度
            $table->string('status', 10);                   // ステータス
            $table->date('last_studied_at')->nullable();    // 最終学習日
            $table->timestamps();                           // created_at / updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('study_items');
    }
};
