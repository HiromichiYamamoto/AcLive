<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use SplFileInfo;
use App\Helpers\Utils;
use Carbon\Carbon;
use App\Http\Requests\ProfileConfirmRequest;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;

class MypageController extends Controller
{

    public function __construct()
    {
//        parent::__construct();

        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            // ユーザー情報の取得
            $this->user = $this->loginCheck();

            return $next($request);
        });
    }

    public function index()
    {
        return view('ac.mypage.index', compact('') + ['user' => $this->user]);
    }

    public function input(Request $request)
    {
        return view('ac.mypage.input', compact('') + ['user' => $this->user]);
    }

    public function complete(ProfileConfirmRequest $request)
    {

        $user_check = $this->loginCheck();
        $user = User::find($this->user['id']);

        if(!$user){
            throw new CU_WarnException("your infomation not found.");
        }
//        $extension = new SplFileInfo($request->file('avatar'));
//        $avatar_filename = 'usr_'.$user_check['id'].'_avatar'.'.'.$extension->extension();
        $before_avatar_filename = $user->avatar;

        DB::transaction(function() use ($request, $user_check) {
            $user = User::find($user_check['id']);

            $user->nickname = ($request->has('nickname')) ? $request->input('nickname') : $user->nickname;
            $user->profile = ($request->has('profile')) ? $request->input('profile') : $user->profile;
            $user->updated_at = Carbon::now();
            $user->save();
        });

        if($request->has('avatar_change')) {

            $user = User::find($user_check['id']);
            $disk = Storage::disk('s3');

            if ($request->file('avatar')) {
                $filename = $request->file('avatar')->storeAs('avatar', $request->file('avatar')->getClientOriginalName(), 'local');
                $user->avatar = basename($filename);
                $user->save();
                $tmp_filepath = storage_path('app/avatar' . '/' . $user->avatar);
                $contents = file_get_contents($tmp_filepath);
                $filepath = Utils::getImagePath(
                        $user->id,
                        config('constants.img_type_folder.user')
                    ) . $user->avatar;

//                 更新の場合
                if (!empty($before_avatar_filename)) {
                    $oldPath = Utils::getImagePath(
                            $user->id,
                            config('constants.img_type_folder.user')
                        ) . $before_avatar_filename;
                    $trashedPath = Utils::getTrashedImagePath(
                            $user->id,
                            config('constants.img_type_folder.user')
                        ) . $before_avatar_filename;

                    if ($disk->exists($oldPath)) {
                        if ($disk->exists($trashedPath)) {
                            $disk->delete($trashedPath);
                        }
                        $disk->move($oldPath, $trashedPath);
                    }
                }
            } else {
                // 論理削除
                if (!empty($before_avatar_filename)) {
                    try {
                        $oldPath = Utils::getImagePath(
                                $user->id,
                                config('constants.img_type_folder.user')
                            ) . $before_avatar_filename;

                        $newPath = Utils::getTrashedImagePath($user->id,
                                config('constants.img_type_folder.user')
                            ) . $before_avatar_filename;

                        if ($disk->exists($oldPath)) {
                            if ($disk->exists($newPath)) {
                                $disk->delete($newPath);
                            }
                            $disk->move($oldPath, $newPath);
                        }

                    } catch (\Exception $ex) {
                        throw new CU_ErrorException("Failed to move image on S3.");
                    }
                }
            }
        }


    // S3 Buketにファイルをアップロード
        if (!$disk->put($filepath, $contents, 'public')){
            throw new CU_ErrorException("Failed to upload image to S3.");

        }

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
