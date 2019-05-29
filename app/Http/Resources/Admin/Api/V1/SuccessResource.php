<?php

namespace App\Http\Resources\Admin\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class SuccessResource extends JsonResource
{
    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->resource,
        ];
    }

    /**
     * @param int $statusCode
     * @return SuccessResource
     */
    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Customize the outgoing response for the resource.
     *
     * @param \Illuminate\Http\Request
     * @param \Illuminate\Http\Response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->setStatusCode($this->statusCode);
    }
}
