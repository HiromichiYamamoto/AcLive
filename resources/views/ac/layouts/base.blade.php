<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>AnyCasLive</title>
    <script src="{{ url('/common') }}/js/common.js"></script>
    <link media="all" type="text/css" rel="stylesheet" href="{{ url('/common') }}/css/style.css">
    <link rel="stylesheet" type="text/css" href="/YOUR-fontello-icon/css/fontello.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,mini
    mum-scale=1.0,user-scalable=no">
</head>

<body>
    <div id="container">

        <header class="Head">
            <div class="Head__wrap">
                <div class="Head__wrap--inner">
                    <nav class="Head__wrap--inner--nav">
                        <div class="Head__wrap--inner--nav-title">AnyCas</div>
                        @if(Auth::user())
                            <div class="Head__wrap--inner--nav-login">マイページ</div>
                        @else
                            <a href="{{ route('login') }}" title="ログインページへ" class="Head__wrap--inner--nav-login">ログイン</a>
                        @endif
                    </nav>
                </div>
            </div>
        </header>

        @yield('content')

        <footer class="Foot">
            <div class="Foot__wrap">
                <div class="Foot__wrap--nav">
                    <div class="Foot__wrap--nav-text1"> AnyCas Japan CO.,LTD . All Rights Reserved</div>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>
