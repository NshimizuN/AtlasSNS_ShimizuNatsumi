<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title>AtlasSNS/改修課題</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--フォントオーサム↓-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="./images/icon1.png" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

<body>

    <header>
        <div class="logo-box">
            <a href="/top"><img src="{{asset('./images/atlas.png')}}" alt="ロゴ" class="logo" width="90" height="33"></a>
        </div>
        <div class="all-user">
            <div class="user">
                <div class="username-box">
                    <span class="username">{{Auth::user()->username}} さん</span>
                </div>
                <div class="accordion-menu">
                    <div class="accordion-title js-accordion-title"></div>
                    <div class="accordion-container">
                        <!--$user->usernameで名前カラムを渡す-->
                        <!--ハンバーガーメニュー-->
                        <div class="accordion-content">
                            <ul class="menu-list">
                                <li class="accordion-list1"><a href="/top" class="home-text">ホーム</a></li>
                                <li class="accordion-list2"><a href="/profile" class="profile-text">プロフィール編集</a></li>
                                <li class="accordion-list3"><a href="/logout" class="logout-text">ログアウト</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-icon">
                @if(Auth::user()->images == "dawn.png")
                <img src="/images/icon1.png" alt="初期アイコン" class="アイコン" width="70" height="70">
                @else
                <img src=" {{ asset('storage/'.Auth::user()->images)}}" alt="icon" class="icon" width="70" height="70">
                @endif
            </div>
        </div>
    </header>


    <div class="container">

        <div class="main-content">
            @yield('content')
        </div>

        <div class="side-menu">
            <div class="user-name">{{Auth::user()->username}}さんの</div>
            <div class="follow-btn-box">
                <div class="side-follow-btn1">
                    <p><span class="mgr-30">フォロー数</span>{{ Auth::user()->follows->count() }}名</p>
                </div>
                <p class="followlist-btn1"><a href="/follow-list">フォローリスト</a></p>

                <div class="side-follow-btn2">
                    <p><span class="mgr-40">フォロワー数</span>{{ Auth::user()->followers->count() }}名</p>
                </div>
                <p class="followlist-btn2"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <hr color="#000000" size="1px">
            <div class="searchbtn-box">
                <p class="search-btn"><a href="/search">ユーザー検索</a></p>
            </div>
        </div>

    </div>

    <footer>
    </footer>
    <!--jQuery-->
    <!--<script src="/AtlasSNS/public/js/jquery-3.6.1.min.js"></script>-->
    <script src="{{ asset('/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>

</html>
