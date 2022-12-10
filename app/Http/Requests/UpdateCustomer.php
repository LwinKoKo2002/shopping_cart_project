<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomer extends FormRequest
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
        $customer = $this->route('customer');
        return [
            'name'=>['required','min:3','max:11'],
            'email'=>['required','email',Rule::unique('users', 'email')->ignore($customer)],
            'phone'=>['required','min:9','max:11',Rule::unique('users', 'phone')->ignore($customer)],
            'password'=>['required','min:8','max:16'],
            'city_id'=>['required',Rule::exists('cities', 'id')],
            'address'=>['required']
        ];
    }
    
        public function messages()
        {
            return [
                'city_id.required'=>'Please filled your city.'
            ];
        }
}
