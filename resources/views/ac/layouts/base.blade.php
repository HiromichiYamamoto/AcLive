<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>AnyCasLive</title>
    <script src="{{ url('/common') }}/js/common.js"></script>
    <link media="all" type="text/css" rel="stylesheet" href="{{ url('/common') }}/css/style.css">
</head>

<body>
    <div>
        <header id="header">
            <div class="header__wrapper">
                <nav class="header__wrapper--nav">
                    <div class="header__wrapper--nav-title">AnyCas</div>
                </nav>
            </div>
        </header>


        @yield('content')
        <!-- 非共通ページコンテンツ END -->

        <footer id="footer">
            <div class="footer__wrapper">
                <div class="footer__wrapper--nav">

                </div>
            </div>
        </footer>
    </div>
</body>

</html>
