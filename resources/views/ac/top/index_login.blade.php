@extends('ac.layouts.base')

@section('content')
    <section class="section-1">
            <div class="TopMain">
                <div class="TopMainWrap">
                    <div class="TopMainBox">
                        <ul class="TopMainBox__menu">
                            <li><a href=""><p>ホーム</p></a></li>
                            <li><a href=""><p>ライブ</p></a></li>
                            <li><a href=""><p>タイムテーブル</p></a></li>
                            <li><a href=""><p>イベント</p></a></li>
                            <li><a href=""><p>キャンペーン</p></a></li>
                            <li><a href=""><p>ホットトピックス</p></a></li>
                            <li><a href=""><p>ランキング</p></a></li>
                            <li><a href=""><p>アバターショップ</p></a></li>
                            <li><a href=""><p>ルーム</p></a></li>
                        </ul>
                        <div class="TopMainBox__live">
                            <iframe class="TopMainBox__live--movie" src="https://www.youtube.com/embed/EEr_rLF9its" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <div class="TopMainBox__now">
                            <div class="TopMainBox__now--icon"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-2">
        <div class="TopSub">
            <div class="TopSubWrap">
                <div class="TopSubBox">
                </div>
            </div>
        </div>
    </section>

    <section class="section-3">
        <div class="TopSub2">
            <div class="TopSub2Wrap">
                <div class="TopSub2__menu">
                    <div class="TopSub2__menu--title">オススメパフォーマー</div>
                    <div class="TopSub2__menu--list">
                        <div class="TopSub2__menu--list-wrap">
                            @include('ac.share.user_list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-4">
        <div class="TopFoot">
            <div class="TopFootWrap">
                <div class="TopFoot__menuLeft">
                    <div class="TopFoot__menuLeft--top">
                        <div class="TopFoot__menuLeft--top-title">ONLIVE</div>
                        <a class="TopFoot__menuLeft--top-sub">人気</a>
                        <a class="TopFoot__menuLeft--top-sub">新着</a>
                    </div>
                    <div class="TopFoot__menuLeft--list">
                        @include('ac.share.performer_list')
                    </div>
                    <button class="TopFoot__menuLeft--button">もっと見る</button>
                </div>
                <div class="TopFoot__menuRight">
                    <div>ユーザー</div>
                </div>
            </div>
    </section>
@endsection
