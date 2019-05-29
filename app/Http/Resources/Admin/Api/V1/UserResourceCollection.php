<?php

namespace App\Http\Resources\Admin\Api\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserResourceCollection extends ResourceCollection
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
            'data' => UserResource::collection($this->collection),
        ];
    }
}
