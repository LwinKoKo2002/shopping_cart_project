<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductDetail extends FormRequest
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
            'product_id'=>['required',Rule::exists('products', 'id')],
            'screen_size'=>['required'],
            'ram'=>['required'],
            'back_camera'=>['required'],
            'front_camera'=>['required'],
            'cpu'=>['required'],
            'battery'=>['required'],
            'warranty'=>['required'],
            'weight'=>['required'],
            'os'=>['required'],
            'ssd'=>['required'],
            'graphic'=>['required'],
            'conectivity'=>['required']
        ];
    }
    public function messages()
    {
        return [
            'product_id.required'=>'Please filled your productl.'
        ];
    }
}
