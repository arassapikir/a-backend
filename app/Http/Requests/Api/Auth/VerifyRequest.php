<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VerifyRequest extends FormRequest
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
            'phone' => [
                'required',
                'numeric',
                'between:61000000,65999999',
                Rule::exists('users', 'phone')
                    ->where('type', 'user')
                    ->where('project_id', config()->get('project')->id ?? 0)
            ],
            'otp' => 'required|numeric|between:100000,999999'
        ];
    }
}
