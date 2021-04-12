<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
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
                Rule::unique('users', 'phone')
                    ->where('type', 'user')
                    ->where('project_id', config()->get('project')->id)
            ],
            'name' => 'nullable|string|min:3'
        ];
    }
}
