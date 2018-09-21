<?php

namespace App\Http\Requests\Api\V1;

use App\Http\Requests\ApiRequest;
use App\Models\User;

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
            case 'POST':
                {
                    return [
                        'email' => "required|unique:users,email",
                        'role.id' => "required|in:" . implode(",", User::roles()),
                        'country.id' => "required|exists:countries,id"
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => "required|unique:users,name,$id,id",
                        'role.id' => "required|in:" . implode(",", User::roles()),
                        'country.id' => "required|exists:countries,id"
                    ];
                }
            default:
                break;
        }
    }
}
