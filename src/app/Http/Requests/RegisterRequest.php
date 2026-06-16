<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'required',
            'email'    => 'required|email',
            // Laravel標準の 'confirmed' ルールを使うと password_confirmation との比較がスムーズです
            'password' => 'required|min:8|confirmed',
        ];
    }

    /**
     * エラーメッセージ
     * テストケースの「期待挙動」に一言一句合わせました
     */
    public function messages()
    {
        return [
            'name.required'     => 'お名前を入力してください',
            'email.required'    => 'メールアドレスを入力してください',
            'email.email'       => 'メールアドレスはメール形式で入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.min'      => 'パスワードは8文字以上で入力してください',
            // テストケースの「パスワードと一致しません」に対応
            'password.confirmed'=> 'パスワードと一致しません',
        ];
    }
}