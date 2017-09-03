<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['country'])->paginate(10);
        return response($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'role' => $request->role,
            'country_id' => $request->country['id'],
        ]);
        return response($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        User::findOrFail($id);
        $user = User::query()->where('id',$id)->with(['country']);
        return response($user->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'email' => $request->email,
            'name' => $request->name,
            'role' => $request->role,
            'country_id' => $request->country['id'],
        ]);
        return response($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // todo
    }

    /**
     * Get user roles
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getRoles()
    {
        return response([
                [
                    'id' => User::ROLE_USER,
                    'name' => 'User'
                ],
                [
                    'id' => User::ROLE_ADMIN,
                    'name' => 'Administrator'
                ]
            ]
        );
    }
}
