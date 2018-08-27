<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>AnyCasLive</title>
    <script src="{{ url('/common') }}/js/app.js"></script>
    <script src="{{ url('/common') }}/js/common.js"></script>
    <link media="all" type="text/css" rel="stylesheet" href="{{ url('/common') }}/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,mini
    mum-scale=1.0,user-scalable=no">
</head>

<body>
    <div id="container">
        @if(Auth::user())
            <div class="headTitle">
                <div class="headTitle__box">
                    <div class="headTitle__box--icon">ホーム</div>
                </div>
            </div>
            <header class="Head">
                <div class="HeadWrap">
                    <div class="Head__inner">
                        <nav class="Head__inner--nav">
                            <a href="{{route('top')}}" class="Head__inner--nav-title">AnyCas</a>
                            <div><a class="Head__inner--nav-login link" href="{{route('logout')}}">ログアウトする</a></div>
                            <a href="{{ route('mypage') }}" class="Head__inner--nav-login" title="マイページへ">
                                @if($navData['userInfo']['avatar_url'])
                                    <div class="Head__inner--nav-avatar" style="background-image: url('{{ $navData['userInfo']['avatar_url'] }}');"></div>
                                @else
                                    <div class="Head__inner--nav-avatar"></div>
                                @endif
                                <div class="Head__inner--nav-nickname">{{ $navData['userInfo']['nickname'] }}</div>
                            </a>
                        </nav>
                    </div>
                </div>
            </header>
        @else
            <header class="Head">
                <div class="HeadWrap">
                    <div class="Head__inner">
                        <nav class="Head__inner--nav">
                            <a href="{{route('top')}}" class="Head__inner--nav-title">AnyCas</a>
                            <a href="{{ route('login') }}" title="ログインページへ" class="Head__inner--nav-login">ログイン</a>
                        </nav>
                    </div>
                </div>
            </header>
        @endif

        @yield('content')

        <footer class="Foot">
            <div class="FootWrap">
                <div class="Foot__nav">
                    <div class="Foot__nav-text1"> AnyCas Japan CO.,LTD . All Rights Reserved</div>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>
