<?php

namespace App\Http\Controllers\Admin\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'name' => config('app.name'),
            'url' => config('app.url') . '/admin',
            'api_url' => config('app.url') . '/api/admin/v1/',
            'roles' => User::getRoles(),
        ];
        return response()->json($data);
    }
}
