<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminUser extends FormRequest
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
        $admin_user = $this->route('admin_user');
        return [
            'name'=>['required','min:3','max:11'],
            'email'=>['required','email',Rule::unique('admin_users', 'email')->ignore($admin_user)],
            'phone'=>['required','min:9','max:11',Rule::unique('admin_users', 'phone')->ignore($admin_user)],
            'password'=>['required','min:8','max:16']
        ];
    }
}
