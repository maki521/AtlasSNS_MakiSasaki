<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <!--アコーディオンメニューCSS-->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div id = "head">
        <!-- トップページへのリンクを設置 -->
        <h1><a href="/top"><img src="images/atlas.png" alt="Atlas"></a></h1>
            <div id="container" class= "mt-5">
                     <!-- セッションから username を表示 -->
                    <p>{{ session('username')}} さん</p><img src="{{ asset('/images/icon1.png')}}">
                <!-- 「HOME」「プロフィール編集」「ログアウト」のページ遷移リンクにアコーディオンメニューを実装 -->
                <div id="accordion">
                    <div id="dropdownMenuButton">
                        <span id="arrow">⏷</span>
                    </div>
                    <ul id="menu" class="hidden">
                        <li><a href="/top">HOME</a></li>
                        <li><a href="/profile">プロフィール編集</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" style="background: none; border: none; padding: 0; color: #007bff; text-decoration: underline; cursor: pointer;">
                                    ログアウト
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                 <!-- セッションから username を表示 -->
                <p>{{ session('username')}}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
