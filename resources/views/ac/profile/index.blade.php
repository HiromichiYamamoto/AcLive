@extends('ac.layouts.base')

@section('content')

    <section class="section-1">
        <div class="ProMain">
            <div class="ProMainWrap">
                <div class="ProMainBox">
                    <div class="ProMainBox__title Title">プロフィール</div>
                    <div class="ProMainBox__left">
                        <div class="ProMainBox__left--avatar">アバター</div>
                        <div class="ProMainBox__left--form">アバター編集</div>
                        <a href="{{route('profile.input')}}">プロフィール編集</a>
                    </div>
                    <div class="ProMainBox__right">
                        <div class="ProMainBox__right--nickname"></div>
                        <div class="ProMainBox__right--profile"></div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
