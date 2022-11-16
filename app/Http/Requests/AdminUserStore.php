<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserStore extends FormRequest
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
            'name' => 'required|unique:admin_users,name',
            'email' => 'required|email|unique:admin_users,email',
            'phone' => 'required|unique:admin_users,phone',
            'password' => 'required|min:6|max:20',
        ];
    }
}
