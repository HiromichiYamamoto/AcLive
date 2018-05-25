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
        {{--<header id="header">--}}
            {{--<div class="header__wrapper">--}}
                {{--<nav class="header__wrapper--nav">--}}
                    {{--<div class="header__wrapper--nav-title">AnyCas</div>--}}
                {{--</nav>--}}
            {{--</div>--}}
        {{--</header>--}}

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
