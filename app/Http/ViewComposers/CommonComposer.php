<?php
namespace App\Http\ViewComposers;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CommonComposer
{
    public function __construct()
    {
        //
    }

    /**
     * データをビューと結合
     *
     * @param  View  $view
     * @return void
     */

    function compose(View $view)
    {
        $view_data = $view->getData();//既に存在するデータ

        if(isset($view_data['navData'])) {
            // viewの中でincludeされていると何回もこのcompose()を呼び出すための制御
            return;
        }

        // (0)初期化
        $navData = config('constants.init_common_data');

        // ()ユーザー情報
        if(Auth::user()) {
            $user = Auth::user();

            $navData['userInfo']['nickname'] = $user->nickname;
            $navData['userInfo']['profile'] = $user->profile;
            $navData['userInfo']['rank'] = $user->rank;
            $navData['userInfo']['avatar_url'] = $user->avatar_url;
            $navData['userInfo']['home_image'] = $user->home_image;
            $navData['userInfo']['membership_state'] = $user->membership_state;

        }

        $view->with('navData', $navData);
    }

}