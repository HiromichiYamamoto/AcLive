<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ProfileConfirmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nickname' => 'max:20|min:1',
            'avatar' => '',
            'profile' => 'max:1000',
        ];
    }

    public function attributes() {
        return [
            'nickname' => 'ニックネーム',
            'profile' => '自己紹介',
            'avatar' => 'アバター',
        ];
    }

    public function messages()
    {
        return [
            'nickname.max' => 'ニックネームは20文字以内で入力してください。',
            'nickname.min' => 'ニックネームを入力してください。',
            'profile.max' => 'プロフィールは1000文字以下で入力してください。',
        ];
    }
}
