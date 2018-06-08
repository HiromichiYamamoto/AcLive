@extends('ac.layouts.base')

@section('content')
    <section class="section-1">
        <div class="wrapper">

            <h3 class="Title">ユーザー登録</h3>

            <h3 class="InputTitle">プロフィール情報</h3>

            <div>
                {!! Form::open(['url' => '/register/confirm', 'method' => 'post', 'novalidate' => '', 'class' => 'InputForm' ]) !!}
                <dl>
                    <dt >プロフィール画像</dt>
                    <dd>
                        {{--{!! Form::text('nickname', $nickname,--}}
                            {{--[--}}
                                {{--'id' => 'nickname',--}}
                                {{--'placeholder' => '30文字以内',--}}
                                {{--'maxlength' => 30,--}}

                            {{--]) !!}--}}
                    </dd>
                </dl>
                <dl>
                    <dt>ニックネーム</dt>
                    <dd></dd>
                </dl>
                <dl>
                    <dt>プロフィール</dt>
                    <dd></dd>
                    <dd>登録したニックネームは変更できませんのでご注意ください</dd>
                </dl>
                <dl>
                    <dt></dt>
                    <dd></dd>
                </dl>
                <dl>
                    <dt></dt>
                    <dd></dd>
                </dl>

            </div>
            <div class></div>

        </div>
    </section>
@endsection