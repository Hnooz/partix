<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartRequest extends FormRequest
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
            'name' => 'required|min:4',
            'number' => 'required|unique:parts|max:255',
            'description' => 'required|max:255|min:45',
            'price' => 'required|max:255',
            'second_price' => 'required|max:255',
            'slug' => 'required|max:255',
            'car_id' => 'required|max:255',
            'category_id' => 'required|max:255',
            'supplier_id' => 'required|max:255',
            'part_type_id' => 'required|max:255',
            'sale' => 'sometimes|nullable',
            'brand_id' => 'required|max:255',
        ];
    }
}