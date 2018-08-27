@extends('ac.layouts.base')

@section('content')
    <section class="section-1">
        <div class="MyProfile">
            <div class="MyProfile__homeImg">
                <div class="MyProfile__homeImg-shadow"></div>
                <div class="MyProfile__box">
                    @if($user->avatar_url)
                        <div class="MyProfile__box--avatar" style="background-image: url('{{ $user->avatar_url }}');"></div>
                    @else
                        <div class="MyProfile__box--avatar"></div>
                    @endif
                    <div class="MyProfile__box--right">
                        <button class="MyProfile__box--right-message">メッセージ</button>
                        <div class="MyProfile__box--right-status"></div>
                        <div class="MyProfile__box--right-now">LIVE中</div>
                    </div>
                    <div class="MyProfile__box--nickname">{{ $navData['userInfo']['nickname'] }}</div>
                    <a class="MyProfile__box--input" href="{{route('mypage.input')}}" title="プロフィール編集画面へ">プロフィール編集</a>
                    <div class="MyProfile__box--follow">39 フォロー</div>
                    <div class="MyProfile__box--follower">39,008 フォロワー</div>
                </div>
            </div>
            <div class="MyProfile__wrap">
                <div class="MyProfile__text">
                    <p><?php echo nl2br($navData['userInfo']['profile']); ?></p>
                </div>
            </div>
        </div>
    </section>
@endsection
