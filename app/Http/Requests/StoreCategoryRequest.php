<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        $rules = [
            'name' => [
                'required',
                Rule::unique('categories', 'name')->ignore($this->category),
            ],
            'name_ar' => [
                'required',
                Rule::unique('categories', 'name_ar')->ignore($this->category),
            ],
            'sale' => ['sometimes','nullable','max:255'],
            'super_category_id' => ['sometimes','nullable','max:255'],
        ];

        return $rules;
    }
}
