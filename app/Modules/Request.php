<?php

namespace App\Modules;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    protected $forceJsonResponse = true;

    // Request route names
    protected $namingRoute = [
    ];
     
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $routeName = ($this->route()->getName());
        if (isset($this->namingRoute[$routeName])) {
            return (new $this->namingRoute[$routeName])->rules();
        }

        return [];
    }
}
