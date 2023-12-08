<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last-name' => ['required','string','max:255'],
            'first-name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'postcode' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
            'opinion' => ['required', 'string','max:120'],
        ];
    }
    public function messages()
    {
        return[
            'last-name.required' => '名字を入力してください',
            'last-name.string' => '名字を文字列で入力してください',
            'last-name.max' => '名字を255文字以下で入力してください',
            'first-name.required' => '名前を入力してください',
            'first-name.string' => '名前を文字列で入力してください',
            'first-name.max' => '名前を255文字以下で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.numeric' => '郵便番号を数値で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'address.max' => '住所を255文字以下で入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.string' => 'ご意見を文字列で入力してください',
            'opinion.max' => 'ご意見を120文字以下で入力してください',
        ];
    }
}
