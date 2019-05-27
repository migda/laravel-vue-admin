<?php

namespace App\Http\Requests\Admin\Api\V1;

use App\Http\Requests\ApiRequest;

class CountryRequest extends ApiRequest
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
                        'name' => "required|string|max:191|unique:countries,name",
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => "required|string|max:191|required|unique:countries,name,$id,id",
                    ];
                }
            default:
                break;
        }
    }
}
