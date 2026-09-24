<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', '学習項目一覧') | CCNA 学習管理システム</title>
<style>
:root{
  --navy:#1f3a5f; --navy-dark:#183050; --bg:#eaf1fb; --card:#fff; --line:#dfe7f3;
  --text:#1e2a3a; --sub:#6b7a90; --blue:#2680eb; --blue-dark:#1b6ad0; --red:#d64545;
}
*{box-sizing:border-box}
body{margin:0;background:var(--bg);color:var(--text);
  font-family:"Hiragino Sans","Noto Sans JP","Yu Gothic UI","Yu Gothic",Meiryo,sans-serif;font-size:14px;line-height:1.6}
a{color:inherit;text-decoration:none}
.app{display:flex;min-height:100vh}

/* サイドバー */
.sidebar{width:220px;flex-shrink:0;background:var(--navy);color:#fff;padding:20px 14px}
.brand{padding:4px 10px 22px}
.brand-name{display:block;font-size:20px;font-weight:700;letter-spacing:.04em}
.brand-sub{display:block;font-size:11px;color:#b9c8dd}
.sidebar nav a{display:block;padding:10px 12px;margin-bottom:4px;border-radius:8px;color:#d5e0ef}
.sidebar nav a:hover{background:var(--navy-dark)}
.sidebar nav a.active{background:var(--blue);color:#fff;font-weight:600}

/* メイン */
.main{flex:1;min-width:0;padding:28px 32px 48px}
.page-head{display:flex;justify-content:space-between;align-items:flex-start;gap:16px;margin-bottom:18px}
h1{margin:0;font-size:24px;color:var(--navy)}
.lead{margin:2px 0 0;color:var(--sub);font-size:13px}
.panel{background:var(--card);border:1px solid var(--line);border-radius:12px;padding:20px}
.flash{background:#e6f6ec;border:1px solid #b9e3c8;color:#1d6b3b;padding:10px 14px;border-radius:8px;margin-bottom:16px}

/* ボタン */
.btn{display:inline-block;padding:9px 18px;border:1px solid var(--line);border-radius:8px;background:#fff;
  color:var(--navy);font:inherit;font-weight:600;cursor:pointer;text-align:center}
.btn:hover{background:#f3f7fd}
.btn-primary{background:var(--blue);border-color:var(--blue);color:#fff}
.btn-primary:hover{background:var(--blue-dark)}
.btn-danger{color:var(--red);border-color:#f1c4c4;background:#fff7f7}
.btn-danger:hover{background:#ffeaea}
.btn-sm{padding:5px 12px;font-size:12px}
:focus-visible{outline:2px solid var(--blue);outline-offset:2px}

/* 検索フォーム */
.filters{display:flex;flex-wrap:wrap;gap:10px;margin-bottom:16px}
.filters input[type=search]{flex:1 1 220px}
input[type=text],input[type=search],input[type=date],select,textarea{
  width:100%;padding:9px 12px;border:1px solid var(--line);border-radius:8px;background:#fff;font:inherit;color:inherit}
.filters select{width:auto;min-width:160px}
textarea{min-height:110px;resize:vertical}

/* テーブル */
.table-wrap{overflow-x:auto;border:1px solid var(--line);border-radius:10px}
table{width:100%;border-collapse:collapse;min-width:760px}
th{background:#f0f5fc;text-align:left;padding:11px 14px;font-size:12px;color:var(--navy)}
td{padding:12px 14px;border-top:1px solid var(--line);white-space:nowrap}
.actions{display:flex;gap:6px}
.empty{padding:36px 12px;text-align:center;color:var(--sub)}

/* バッジ */
.badge{display:inline-block;padding:2px 12px;border-radius:999px;font-size:12px;font-weight:600}
.u1{background:#ffe3e6;color:#c0394b}  .u2{background:#dff5e7;color:#25804a}
.u3{background:#dcebff;color:#2465b8}  .u4{background:#eadcff;color:#6a3bb5}
.s1{background:#eceff4;color:#5c6a7e}  .s2{background:#fff0cc;color:#a86a00}  .s3{background:#d9f5e3;color:#1f7a45}

/* ページ送り */
.pagination{display:flex;justify-content:flex-end;gap:6px;margin-top:16px}
.pagination .page{min-width:34px;padding:6px 10px;border:1px solid var(--line);border-radius:8px;background:#fff;text-align:center}
.pagination a.page:hover{background:#f3f7fd}
.pagination .current{background:var(--blue);border-color:var(--blue);color:#fff}
.pagination .disabled{color:#b3bfd0}

/* フォーム */
.form-panel{max-width:760px}
.field{display:grid;grid-template-columns:130px 1fr;gap:6px 16px;padding:14px 0;border-top:1px solid var(--line)}
.field:first-child{border-top:0}
.field>label,.field>.label{font-weight:700;padding-top:8px}
.req{color:var(--red);margin-left:2px}
.radios{display:flex;flex-wrap:wrap;gap:8px 20px;padding-top:8px}
.radios label{display:flex;align-items:center;gap:6px;cursor:pointer}
.error{grid-column:2;margin:0;color:var(--red);font-size:12px}
.form-actions{display:grid;grid-template-columns:1fr 1fr;gap:16px;max-width:760px;margin-top:20px}

/* 詳細 */
.detail-head{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;margin-bottom:8px}
.detail-head h2{margin:0;font-size:22px;color:var(--navy)}
.tag{display:inline-block;margin-top:4px;padding:1px 10px;border-radius:6px;background:#eef2f8;color:var(--sub);font-size:12px}
.detail-row{display:grid;grid-template-columns:130px 1fr;gap:16px;padding:14px 0;border-top:1px solid var(--line)}
.detail-row dt{font-weight:700}
.detail-row dd{margin:0;white-space:pre-wrap}
.detail-actions{display:flex;gap:12px;margin-top:20px}
.back{display:inline-block;margin-bottom:12px;color:var(--blue);font-size:13px}

@media (max-width:800px){
  .app{flex-direction:column}
  .sidebar{width:auto;display:flex;align-items:center;gap:16px;padding:10px 14px}
  .brand{padding:0}
  .sidebar nav{display:flex;gap:4px}
  .sidebar nav a{margin:0;padding:8px 10px}
  .main{padding:20px 16px 40px}
  .field,.detail-row{grid-template-columns:1fr}
  .error{grid-column:1}
  .form-actions{grid-template-columns:1fr}
}
</style>
</head>
<body>
<div class="app">
  <aside class="sidebar">
    <div class="brand">
      <span class="brand-name">CCNA</span>
      <span class="brand-sub">学習管理システム</span>
    </div>
    <nav>
      <a href="{{ route('study-items.index') }}" class="{{ request()->routeIs('study-items.index') ? 'active' : '' }}">学習項目一覧</a>
      <a href="{{ route('study-items.create') }}" class="{{ request()->routeIs('study-items.create') ? 'active' : '' }}">新規登録</a>
    </nav>
  </aside>

  <main class="main">
    @if (session('success'))
      <div class="flash" role="status">{{ session('success') }}</div>
    @endif
    @yield('content')
  </main>
</div>
</body>
</html>
