@extends('ac.layouts.base2')

@section('content')
    <section>
    <div class="ProInputMain">
        <div class="Title">プロフィール編集</div>

        <div>
            {!! Form::open(['url' => route('mypage/complete'), 'method' => 'POST', 'class' => 'input-form', 'novalidate' => '']) !!}
                <dl>
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
                <dl>
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
@endsection
