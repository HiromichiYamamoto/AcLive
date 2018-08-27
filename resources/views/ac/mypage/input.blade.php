@extends('ac.layouts.base')

@section('content')
    <section class="section-1">
        <div class="ProInputMain">
            <div class="ProWrap">
                <div class="Title">プロフィール編集</div>
                <div class="ProInputMain__box">
                    {!! Form::open(['url' => route('mypage/complete'), 'method' => 'POST', 'class' => 'input-form', 'novalidate' => '', 'enctype' => 'multipart/form-data']) !!}
                        <dl class="form_input">
                            <dt class="ProInputMain__nickname">ニックネーム</dt>
                            <dd class="ProInputMain__nickname-form">
                                {!! Form::text('nickname',
                                    $user->nickname,
                                    [
                                        'class' => $errors->has('nickname')?'error':'',
                                        'placeholder' => 'ニックネームを記入してください（最大20文字）',
                                        'required' => 'required',
                                        'maxlength' => 20,
                                    ]
                                ) !!}
                                @foreach($errors->get('nickname') as $error)
                                    <p class="error-msg">{{$error}}</p>
                                @endforeach
                            </dd>
                        </dl>
                        <dl class="form_input">
                            <dt>プロフィール画像</dt>
                                @if($user->avatar_url)
                                    <dd class="ProInputMain__avatar avater_up" id="avatar_change" style="background-image: url('{{ $user->avatar_url }}');"></dd>
                                @else
                                    <dd class="ProInputMain__avatar avater_up" id="avatar_change"></dd>
                                @endif
                                {{--{!! Form::open(['url' => route('profile/changeAvatar'), 'method' => 'POST', 'id' => 'avatar_change_form']) !!}--}}
                                    {{--<input name="avatar" type="file" id="avatar_file" class="uploadFile file avatar-up" style="display:none;">--}}
                                        {!! Form::file('avatar', ['class' => 'uploadFile file avatar-up', 'id' => 'avatar_file'])!!}
                                        {!! Form::hidden('avatar_change', "1") !!}
                                {{--{!! Form::close() !!}--}}
                        </dl>
                        <dl class="form_input">
                            <dt>プロフィール</dt>
                            <dd>
                                {!! Form::textarea('profile',
                                    $user->profile,
                                    [
                                        'class' => $errors->has('profile')?'error':'',
                                        'placeholder' => 'プロフィール文を記入してください（最大1000文字）',
                                        'maxlength' => 1000,
                                    ]
                                ) !!}
                                @foreach($errors->get('profile') as $error)
                                    <p class="error-msg">{{$error}}</p>
                                @endforeach
                            </dd>
                        </dl>
                        <div>
                            <button type="submit">変更</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>

@endsection
