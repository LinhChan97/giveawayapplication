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
            'username' => 'required|exists:users,username',
            'password' => 'required|min:8',
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
