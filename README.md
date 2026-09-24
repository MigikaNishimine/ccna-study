CCNA 学習管理システム

CCNAの学習内容と理解度を記録・管理するための、個人学習用Webアプリケーションです。
学習項目ごとに「理解度」「ステータス」を記録し、進捗を可視化することを目的に開発しました。

目的

- CCNA資格取得に向けた学習の進捗管理
- 復習すべき項目の可視化

使用技術

- PHP / Laravel
- MySQL
- Docker / Laravel Sail(開発環境)
- Blade(テンプレートエンジン)

実装機能

- 学習項目の登録・一覧表示・詳細表示・編集・削除
- 理解度(4段階)、ステータス(3種類)の管理
- キーワード検索、分野・ステータスによる絞り込み
- 入力バリデーション(必須項目、文字数制限など)
- ページネーション


セットアップ手順

\`\`\`bash
1. リポジトリをクローン
git clone git@github.com:MigikaNishimine/ccna-study.git
cd ccna-study

2. Sailで環境構築(Docker Desktopの起動が必要です)
composer install
./vendor/bin/sail up -d

3. .envを準備
cp .env.example .env
./vendor/bin/sail artisan key:generate

4. マイグレーション
./vendor/bin/sail artisan migrate
\`\`\`

起動後、以下にアクセスします。

\`\`\`
http://localhost
\`\`\`



開発の背景

CCNA学習の進捗を自分で管理しつつ、Laravelでの実装力を身につけることを目的に、個人開発として作成しました。
運用しながら、必要な機能を都度追加しています。