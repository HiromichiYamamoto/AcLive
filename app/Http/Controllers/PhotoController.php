<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function userAvatar($id, $filename)
    {
        $user = User::Active()->find($id);

        if(!$user){
            abort(403);
        }

        return $this->makeImage(Utils::getImagePath(
                $id,
                config('constants.img_type_folder.user')
            ) . $filename)
            ->response();
    }

    /**
     * Render image from file path
     * @param string $filePath
     * @return \Intervention\Image\Image
     */
    public function makeImage($filePath) {
        $content = Storage::get($filePath);

        return Image::make($content);
    }

}
