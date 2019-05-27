<?php

namespace App\Http\Resources\Admin\Api\V1;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class AppResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'name' => config('app.name'),
            'url' => config('app.url') . '/admin',
            'api_url' => config('app.url') . '/api/admin/v1/',
            'roles' => User::getRoles(),
        ];
    }
}
