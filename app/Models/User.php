<?php

namespace App\Models;
//use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Filesystem\FilesystemAdapter;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'users';

    protected $guarded = ['id'];

    public function createNewUser(Store $session, Collection $temp_token) {

    }

    public function accounts() {
        return $this->hasMany('App\Models\LinkedSocialAccount');
    }

    /**
     * アバター画像の非公開バケットへ移動処理
     *
     * @param FilesystemAdapter $s3
     * @param Request $request
     * @return bool
     */
    public static function moveAvatarImageToPrivate(FilesystemAdapter $s3, Request $request)
    {
        $img_path = Utils::getImagePath(
                $request->user()->id,
                config('constants.img_type_folder.user')
            ) . $request->user()->avatar;

        $private_img_path = config('constants.image_delete_folder') . $img_path;

        if ($s3->exists($img_path)) {
            return $s3->move($img_path, $private_img_path);
        }

        return true;
    }

    /***********************************************************
     * Accessor
     ***********************************************************/

    public function getAvatarUrlAttribute()
    {
        if (is_null($this->avatar)) {
            return '';
        }

        return "https://s3-ap-northeast-1.amazonaws.com/aclive/local/user/{$this->id}/avatar/{$this->avatar}";
//        return "/local/user/{$this->id}/avatar/{$this->avatar}";
    }

}
