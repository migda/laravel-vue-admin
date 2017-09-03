<?php

namespace App\Http\Requests\Api\V1;

use App\Http\Requests\ApiRequest;

class UserRequest extends ApiRequest
{
    /**
     * Rules
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('user');
        switch ($this->method()) {
            case 'POST': {
                return [
                    'email' => "required|unique:users,email",
                    'country.id' => "required|exists:countries,id"
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => "required|unique:users,name,$id,id",
                    'country.id' => "required|exists:countries,id"
                ];
            }
            default:
                break;
        }
    }
}
