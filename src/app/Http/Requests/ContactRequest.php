<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * 1. 認証：ここを true にしないとバリデーションが走りません
     */
    public function authorize()
    {
        return true; 
    }

    /**
     * 2. ルール：各項目に制約をつけます
     */
    public function rules()
    {
        return [
            'last_name'   => ['required', 'string', 'max:255'],
            'first_name'  => ['required', 'string', 'max:255'],
            'gender'      => ['required'],
            'email'       => ['required', 'string', 'email', 'max:255'],
            'tel1'        => ['required', 'numeric', 'digits_between:1,5'],
            'tel2'        => ['required', 'numeric', 'digits_between:1,5'],
            'tel3'        => ['required', 'numeric', 'digits_between:1,5'],
            'address'     => ['required', 'string', 'max:255'],
            'category_id' => ['required'],
            'detail'      => ['required', 'string', 'max:120'],
        ];
    }

    /**
     * 3. メッセージ：エラー時に表示する日本語を設定します
     */
    public function messages()
    {
        return [
            'last_name.required'  => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required'     => '性別を選択してください',
            'email.required'      => 'メールアドレスを入力してください',
            'email.email'         => 'メールアドレスはメール形式で入力してください',
            'tel1.required'       => '電話番号を入力してください',
            'tel2.required'       => '電話番号を入力してください',
            'tel3.required'       => '電話番号を入力してください',
            'address.required'    => '住所を入力してください',
            'category_id.required'=> 'お問い合わせの種類を選択してください',
            'detail.required'     => 'お問い合わせ内容を入力してください',
            'detail.max'          => 'お問合せ内容は120文字以内で入力してください',
        ];
    }
}