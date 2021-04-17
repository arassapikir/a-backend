<?php

namespace App\Http\Requests;

use App\Models\Layout;
use Illuminate\Foundation\Http\FormRequest;

class LayoutRequest extends FormRequest
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
            'group' => 'required|in:' . implode(",", array_keys(Layout::$layouts)),
            'title' => 'required|string',
            'image' => 'nullable|image'
        ];
    }
}
