<?php

namespace App\Modules\V1\Authentication\Requests;

use App\Modules\Request;
use App\Models\V1\Role;

class RegisterRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [                      
            'name'            => 'required|string',
            'username'            => 'required|unique:users',
            'email'            => 'email|unique:users',
            'phone_number'            => 'required|digits:10',
            'address'            => 'required|string',
            'password'         => 'required|min:8',
            'password_confirm' => 'required|same:password',
            'role_id'          => 'required|numeric|in:'.join(',', [Role::DONOR_ROLE, Role::CHARITY_ROLE])
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
