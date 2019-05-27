<?php

namespace App\Http\Controllers\Admin\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\UserRequest;
use App\Http\Resources\Admin\Api\V1\SuccessResource;
use App\Http\Resources\Admin\Api\V1\UserResource;
use App\Http\Resources\Admin\Api\V1\UserResourceCollection;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): UserResourceCollection
    {
        $users = User::with(['country'])->paginate(config('api.default_per_page'));
        return new UserResourceCollection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest $request
     * @return SuccessResource
     */
    public function store(UserRequest $request): SuccessResource
    {
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'role_id' => $request->role['id'],
            'country_id' => $request->country['id'],
        ]);
        return (new SuccessResource(new UserResource($user)))->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return UserResource
     */
    public function show($id): UserResource
    {
        return new UserResource($this->getItem($id));
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    private function getItem($id)
    {
        $user = User::query()->where('id', $id)->with(['country'])->firstOrFail();
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest $request
     * @param  int $id
     * @return SuccessResource
     */
    public function update(UserRequest $request, $id): SuccessResource
    {
        $user = User::findOrFail($id);
        $user->update([
            'email' => $request->email,
            'name' => $request->name,
            'role_id' => $request->role['id'],
            'country_id' => $request->country['id'],
        ]);
        return (new SuccessResource(new UserResource($user)))->setStatusCode(200);
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
}
