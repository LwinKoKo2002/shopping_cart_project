<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProduct extends FormRequest
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
            'brand_id'=>['required',Rule::exists('brands', 'id')],
            'product_name'=>['required'],
            'screen_size'=>['required'],
            'ram'=>['required'],
            'model'=>['required'],
            'back_camera'=>['required'],
            'front_camera'=>['required'],
            'cpu'=>['required'],
            'battery'=>['required'],
            'warranty'=>['required'],
            'storage'=>['required'],
            'selling_price'=>['required'],
            'quantity'=>['required'],
            'trend'=>['required']
        ];
    }
        public function messages()
        {
            return [
                'brand_id.required'=>'Please filled your brand.',
                'product_img.required'=>'Please filled your product image.',
                'product_name.required'=>'Please filled your product name.',
                'selling_price.required'=>'Please filled your selling price.'
            ];
        }
}
