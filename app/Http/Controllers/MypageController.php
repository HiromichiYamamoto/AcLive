<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

use Carbon\Carbon;
use App\Http\Requests\ProfileConfirmRequest;
use App\Models\User;

class MypageController extends Controller
{

    public function __construct() {
//        parent::__construct();

        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            // ユーザー情報の取得
            $this->user = $this->loginCheck();

            return $next($request);
        });
    }

    public function index() {
        return view('ac.mypage.index');
    }

    public function input(Request $request) {
        return view('ac.mypage.input', compact('') + ['user' => $this->user]);
    }

    public function complete(ProfileConfirmRequest $request) {

        $user_check = $this->loginCheck();
        $user = User::find($this->user['id']);

        if(!$user){
            throw new CU_WarnException("your infomation not found.");
        }

        DB::transaction(function() use ($request, $user_check) {
            $user = User::find($user_check['id']);

            $user->nickname = ($request->has('nickname')) ? $request->input('nickname') : $user->nickname;
            $user->profile = ($request->has('profile')) ? $request->input('profile') : $user->profile;
            $user->updated_at = Carbon::now();
            $user->save();
        });

        return redirect()->to('/mypage')->with('complete_message', 'プロフィールを変更しました。');
    }

    /**
     * loginCheck()
     * ログインのチェックを行う。
     *
     * @return  $user
     * @throws CU_WarnException
     */
    private function loginCheck() {
        // ログインしている場合
        if (Auth::check()) {
            $user = Auth::user();

            if (empty($user)) {
                throw new CU_WarnException("not login.");
            }
        } else {
            throw new CU_WarnException("not login.");
        }

        return $user;
    }

}
