<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>AnyCasLive</title>
    <script src="{{ url('/common') }}/js/common.js"></script>
    <link media="all" type="text/css" rel="stylesheet" href="{{ url('/common') }}/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,mini
    mum-scale=1.0,user-scalable=no">
</head>

<body>
    <div>
        <header class="HeadBef">
            <div class="HeadBef__wrap">
                <div class="HeadBef__wrap--inner">
                    <nav class="HeadBef__wrap--inner--nav">
                        <div class="HeadBef__wrap--inner--nav-title">AnyCas</div>
                        @if(Auth::user())
                            <div class="HeadBef__wrap--inner--nav-login">マイページ</div>
                        @else
                            <a href="{{ route('login') }}" title="ログインページへ"
                               class="HeadBef__wrap--inner--nav-login">ログイン</a>
                        @endif
                    </nav>
                </div>
            </div>
        </header>

        @yield('content')
        <!-- 非共通ページコンテンツ END -->

        <footer class="Footer">
            <div class="Footer__wrap">
                <div class="Footer__wrap--nav">
                    <div class="Footer__wrap--nav-text1"> AnyCas Japan CO.,LTD . All Rights Reserved</div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
