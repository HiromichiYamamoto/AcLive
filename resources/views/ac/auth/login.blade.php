@extends('ac.layouts.base')

@section('content')
<div class="container">

    <div class="wrapper">
        <div class="LogWrap">
            <h2 class="Title LogWrap-title">ログイン</h2>
            <div class="LogWrap__line">
                <a href="" class="LogWrap__line--btn">Lineでログイン・無料登録</a>
                <div class="LogWrap__line--btn-icon"></div>
            </div>
            <div class="LogWrap__fb">
                <a href="" class="LogWrap__fb--btn">Facebookでログイン・無料登録</a>
                <div class="LogWrap__fb--btn-icon"></div>
            </div>
            <hr />
                <div class="panel-body">
                    本Webサービスでは、ログイン時の認証画面にて許可を頂いた場合のみ、あなたのLINEアカウントに登録されているメールアドレスを取得します。<br />
                    取得したメールアドレスは、以下の目的以外では使用いたしません。また、法令に定められた場合を除き、第三者への提供はいたしません。<br />
                    <ul>
                        <li>・ユーザーIDとしてアカウントの管理に利用</li><br />
                        <li>・パスワード再発行時の本人確認に利用</li>
                    </ul>
                </div>
            <hr/>
        </div>
    </div>
</div>
@endsection
