<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'name' => 'required|unique:categories,name',
            'slug' => 'unique'
        ];
    }

    public function messages()
    {
        return [
            'name' . 'required' => 'Vui lòng nhập tên loại',
            'name' . 'unique' => 'Tên loại đã tồn tại',
            'slug' . 'unique' => 'Slug đã tồn tại'
        ];
    }
}
