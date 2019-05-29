<?php

namespace App\Http\Controllers\Admin\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Api\V1\AppResource;

class StartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AppResource
     */
    public function index(): AppResource
    {
        return new AppResource([]);
    }
}
