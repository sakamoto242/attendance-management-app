<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * ユーザーがこのリクエストを行う権限があるか（ログイン済みならOK）
     */
    public function authorize()
    {
        return true;
    }

    /**
     * FN020: バリデーションルール
     */
    public function rules()
    {
        return [
            'comment' => 'required|max:255', // 入力必須、最大255文字
        ];
    }

    /**
     * FN020: エラーメッセージの日本語化（指定文言）
     * ここを書き換えることで「commentを入力してください」から
     * 「商品コメントを入力してください」に変わります。
     */
    public function messages()
    {
        return [
            'comment.required' => '商品コメントを入力してください',
            'comment.max'      => '商品コメントは255文字以内で入力してください',
        ];
    }
}
