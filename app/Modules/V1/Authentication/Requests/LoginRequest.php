<?php

namespace App\Modules\V1\Authentication\Requests;

use App\Modules\Request;

class LoginRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => trans('validation.username-required'),
            'password.required'  => trans('validation.password-required')
        ];
    }
    /**
     * Add parameters to be validated
     *
     * @param array $keys Keys
     *
     * @return array
     */
    public function all($keys = null)
    {
        $data = parent::all($keys);
        return $data;
    }
}
