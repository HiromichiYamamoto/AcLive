<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
use SplFileInfo;
use Storage;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;
use App\Helpers\Utils;

class ImageController extends Controller
{

    private $response_json = [
        'RESULT_STATUS' => 1,
        'RESULT_MESSAGE' => '',
        'RESULT' => []
    ];

    public function __construct()
    {
    }


    /**
     * 画像の一時ディレクトリへのリサイズ＆アップロード または 削除
     *
     * @return json
     */
    public function upload(Request $request)
    {
        $response_json = $this->response_json;
        $response_json['RESULT']['FILENAME'] = "";

        if (!Auth::user()) {
            // 未ログイン
            $response_json['RESULT_STATUS'] = 3;
            $response_json['RESULT_MESSAGE'] = config('constants.result_status_message.image_upload.'.$response_json['RESULT_STATUS']);
            return response()->json($response_json);
        }

        if ($request->input('action') == "upload") {

            $validation = Validator::make($request->all(), [
                'file' => 'required|mimes:jpeg,jpg,png,gif|max:10240',
                'img_type' => 'required',
            ]);
            if ($validation->fails()) {
                // バリデーションエラー
                foreach ($validation->failed()['file'] as $key => $value){
                    switch ($key){
                        case 'Mimes':
                            $response_json['RESULT_STATUS'] = 4;
                            break;
                        case 'Max':
                            $response_json['RESULT_STATUS'] = 5;
                            break;
                        default:
                            $response_json['RESULT_STATUS'] = 2;
                    }
                    break;//1つ目のエラーにて返却コードを設定
                }
                $response_json['RESULT_MESSAGE'] = config('constants.result_status_message.image_upload.'.$response_json['RESULT_STATUS']);
                return response()->json($response_json);
            }

            try {
                $type = $request->input('img_type');
                $ext = $request->file('file')->getClientOriginalExtension();

                $image = Image::make($request->file('file')->getRealPath())->orientate();
                $width = $image->width();
                $height = $image->height();

                if ($width > config('filesystems.rule.image.max_width') || $height > config('filesystems.rule.image.max_height')) {
                    if ($width > $height) {
                        $image->resize(config('filesystems.rule.image.max_width'), null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    } else {
                        $image->resize(null, config('filesystems.rule.image.max_height'), function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }
                }

                $temp_filename = md5(sha1(uniqid(mt_rand(), true))).'.'.$ext;
                $temp_folder = config('constants.img_temp_folder').'/'.config('constants.img_type_folder.'.$type);
                $temp_filepath = $temp_folder.'/'.$temp_filename;
                $image->save(public_path() . '/' . $temp_filepath);

                $response_json['RESULT_STATUS'] = 1;
                $response_json['RESULT']['FILENAME'] = $temp_filename;

            } catch (\Exception $e) {
                $response_json['RESULT_STATUS'] = 9;
            }

        } elseif($request->input('action') == "delete") {

            $validation = Validator::make($request->all(), [
                'filename' => 'required',
                'img_type' => 'required',
            ]);
            if ($validation->fails()) {
                // バリデーションエラー
                $response_json['RESULT_STATUS'] = 2;
                $response_json['RESULT_MESSAGE'] = config('constants.result_status_message.image_upload.'.$response_json['RESULT_STATUS']);
                return response()->json($response_json);
            }

            try {
                $type = $request->input('img_type');
                $temp_filename = $request->input('filename');
                $temp_folder = config('constants.img_temp_folder').'/'.config('constants.img_type_folder.'.$type);
                $temp_filepath = $temp_folder.'/'.$temp_filename;

                File::delete(public_path() . '/' . $temp_filepath);

                $response_json['RESULT_STATUS'] = 1;

            } catch (\Exception $e) {
                $response_json['RESULT_STATUS'] = 9;
            }

        } else {
            $response_json['RESULT_STATUS'] = 2;

            // TODO WARNINGログ
            //$log = new Logs();
            //$log->warning();
        }

        $response_json['RESULT_MESSAGE'] = config('constants.result_status_message.image_upload.'.$response_json['RESULT_STATUS']);
        return response()->json($response_json);

    }

}
