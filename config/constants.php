<?php

return [

    /*============  Common Data ==========*/

    'init_common_data' => [
        'userInfo' => [
            'nickname' => '',
            'profile' => '',
            'rank' => '',
            'avatar' => '',
            'home_image' => '',
            'membership_state' => '',
        ],
    ],
    'img_folder' => env('S3_ROOT', 'local/'),
    'img_temp_folder' => 'temp',
    'img_type_folder' => [
        'user' => 'user',
    ],
    'user_avatar_folder' => 'avatar/',


    /*============ Result Status Message ==========*/
    'result_status_message' => [
        'default' => [
            1 => '正常に完了しました。',
            2 => 'リクエストされた処理を中断しました。',
            3 => 'ログインしていないため処理を実行できませんでした。',
            4 => 'リクエストされた処理を中断しました。',
            9 => '異常終了しました。',
        ],
        'image_upload' => [
            1 => '正常に完了しました。',
            2 => 'リクエストされた処理を中断しました。',
            3 => 'ログインしていないため処理を実行できませんでした。',
            4 => '許可されていない画像拡張子のため、リクエストされた処理を中断しました。',
            5 => '画像のサイズがオーバーしているため、リクエストされた処理を中断しました。',
            9 => '異常終了しました。',
        ],
        'image_replicate' => [
            1 => '正常に完了しました。',
            2 => 'リクエストされた処理を中断しました。',
            3 => 'ログインしていないため処理を実行できませんでした。',
            4 => '複製元の画像取得に失敗しました。',
            9 => '異常終了しました。',
        ],
        'top_search' => [
            1 => '正常に完了しました。',
            2 => '検索条件が無効です。',
            9 => '異常終了しました。',
        ],
    ],

];