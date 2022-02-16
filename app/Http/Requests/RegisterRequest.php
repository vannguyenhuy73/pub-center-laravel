<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    const STEP_FIRST = 'step1';
    const MAX_SIZE = 255;
    const MAX_PHONE = 10;
    const MIN_SIZE = 6;
    const MAX_USERNAME = 30;
    const MAX_FULL_NAME = 50;
    const MAX_MAIL = 50;

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
        $rules = [];

        if ($this->step == self::STEP_FIRST) {
            $rules = [
                'full_name' => 'required|string|max:' . self::MAX_FULL_NAME,
                'email' => 'required|email|regex:/^[\w -\.]+@([\w -]+\.)+[\w -]{2,4}+$/|max:' . self::MAX_MAIL . '|unique:taccount,contact_mail',
                'user_name' => 'required|min:' . self::MIN_SIZE . '|regex:/^[a-zA-Z0-9]+$/u|string|max:' . self::MAX_USERNAME . '|alpha_dash|unique:taccount,account_id',
                'phone' => ['required','numeric','regex:/^(09|08|07|05|03)+[0-9]+$/','digits:' . self::MAX_PHONE . '','unique:taccount,contact_phone'],
                'password' => 'required|string|min:' . self::MIN_SIZE . '|alpha_dash|confirmed',
                'link_facebook' => 'required|url',
                'zalo_phone' => ['required','numeric','regex:/^(09|08|07|05|03)+[0-9]+$/','digits:' . self::MAX_PHONE . '','unique:taccount_detail,zalo_phone'],
                'check' => 'required',
            ];
        }

        return $rules;
    }

    /**
     * Messages if validation false.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'full_name.required' => __('custom_validation.required', ['attribute' => __('attribute.full_name')]),
            'full_name.string' => __('custom_validation.string', ['attribute' => __('attribute.full_name')]),
            'full_name.max' => __('custom_validation.max.string',
                [
                    'attribute' => __('attribute.full_name'),
                    'max' => self::MAX_FULL_NAME
                ]),
            'email.required' => __('custom_validation.required', ['attribute' => __('attribute.email')]),
            'email.string' => __('custom_validation.string', ['attribute' => __('attribute.email')]),
            'email.email' => __('custom_validation.string', ['attribute' => __('attribute.email')]),
            'email.regex' => __('custom_validation.regex', ['attribute' => __('attribute.email')]),
            'email.max' => __('custom_validation.max.string',
                [
                    'attribute' => __('attribute.email'),
                    'max' => self::MAX_MAIL
                ]),
            'email.unique' => __('custom_validation.unique', ['attribute' => __('attribute.email')]),
            'user_name.required' => __('custom_validation.required', ['attribute' => __('attribute.user_name')]),
            'user_name.min' => __('custom_validation.min.string',
                [
                    'attribute' => __('attribute.user_name'),
                    'min' => self::MIN_SIZE
                ]),
            'user_name.regex' => __('custom_validation.regex', ['attribute' => __('attribute.user_name')]),
            'user_name.string' => __('custom_validation.string', ['attribute' => __('attribute.user_name')]),
            'user_name.max' => __('custom_validation.max.string',
                [
                    'attribute' => __('attribute.user_name'),
                    'max' => self::MAX_USERNAME
                ]),
            'user_name.alpha_dash' => __('custom_validation.alpha_dash', ['attribute' => __('attribute.user_name')]),
            'user_name.unique' => __('custom_validation.unique', ['attribute' => __('attribute.user_name')]),
            'phone.required' => __('custom_validation.required', ['attribute' => __('attribute.phone')]),
            'phone.numeric' => __('custom_validation.numeric', ['attribute' => __('attribute.phone')]),
            'phone.regex' => __('custom_validation.regex', ['attribute' => __('attribute.phone')]),
            'phone.digits' => __('custom_validation.max.digits',
                [
                    'attribute' => __('attribute.phone'),
                    'digits' => self::MAX_PHONE
                ]),
            'phone.unique' => __('custom_validation.unique', ['attribute' => __('attribute.phone')]),
            'password.required' => __('custom_validation.required', ['attribute' => __('attribute.password')]),
            'password.numberic' => __('custom_validation.string', ['attribute' => __('attribute.password')]),
            'password.min' => __('custom_validation.min.string',
                [
                    'attribute' => __('attribute.password'),
                    'min' => self::MIN_SIZE
                ]),
            'password.alpha_dash' => __('custom_validation.alpha_dash', ['attribute' => __('attribute.password')]),
            'password.confirmed' => __('custom_validation.confirmed', ['attribute' => __('attribute.password')]),
            'link_facebook.required' => __('custom_validation.required', ['attribute' => __('attribute.link_facebook')]),
            'link_facebook.url' => __('custom_validation.url', ['attribute' => __('attribute.link_facebook')]),
            'zalo_phone.required' => __('custom_validation.required', ['attribute' => __('attribute.zalo_phone')]),
            'zalo_phone.regex' => __('custom_validation.regex', ['attribute' => __('attribute.zalo_phone')]),
            'zalo_phone.numeric' => __('custom_validation.string', ['attribute' => __('attribute.zalo_phone')]),
            'zalo_phone.digits' => __('custom_validation.max.digits',
                [
                    'attribute' => __('attribute.zalo_phone'),
                    'digits' => self::MAX_PHONE
                ]),
            'zalo_phone.unique' => __('custom_validation.unique', ['attribute' => __('attribute.zalo_phone')]),
            'check.required' => __('custom_validation.required', ['attribute' => __('attribute.check')]),
        ];
    }

}
