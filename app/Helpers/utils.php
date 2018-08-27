<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\HtmlString;

class Utils
{

    // Date time format
    const DATETIME_FORMAT_JAPAN = "Y年m月d日";
    const DATETIME_FORMAT_YY_MM_DD_HH_JAPAN = "Y年m月d日H時";
    const DATETIME_FORMAT_YY_MM_DD_H_I_JAPAN = "Y年m月d日 H時i分";
    const DATETIME_FORMAT_YY_MM_DD_H_I_S_JAPAN_KANJI = "Y年m月d日 H時i分s秒";
    const TIME_FORMAT_H_I_JAPAN = "H時i分";

    public static function getImagePath($id, $imgFolder)
    {
        // User image
        if ($imgFolder == Config::get('constants.img_type_folder.user')) {
            return Config::get('constants.img_folder') . $imgFolder . '/' . $id . '/' .
                Config::get('constants.user_avatar_folder');
        }
    }

    public static function getTrashedImagePath($id, $imgFolder, $imgType = null, $order = null)
    {
        $base_path = Config::get('constants.img_deleted_prefix').Config::get('constants.img_folder');

        // User image
        if ($imgFolder == Config::get('constants.img_type_folder.user')) {
            return $base_path. $imgFolder . '/' . $id . '/' . Config::get('constants.user_avatar_folder');
        }
        return false;
    }


}