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
            'name_ar' => 'required|min:4',
            'number' => 'required|max:255',
            'description' => 'required|max:255',
            'description_ar' => 'required|max:255',
            'oem_price' => 'required|max:255',
            'aftermarket_price' => 'required|max:255',
            'used_price' => 'required|max:255',
            'category_id' => 'sometimes|max:255',
            'supplier_id' => 'required|max:255',
            'part_type_id' => 'required|max:255',
            'sale' => 'sometimes|nullable',
            'images' => 'sometimes|min:4',
            'cars' => 'sometimes',
            'cars.*' => 'required_with:cars|exists:cars,id',
        ];
    }
}
