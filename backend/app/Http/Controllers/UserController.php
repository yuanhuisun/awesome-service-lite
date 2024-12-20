<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest; // Use Form Requests
use App\Http\Resources\UserResource; // Use API Resources
use App\Http\Controllers\Auth\AuthController; // Use AuthController
use App\Models\User;

class UserController extends Controller
{
    //use UserRequest;
    //
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);
        $users = User::paginate(10);
        return UserResource::collection($users);
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        return new UserResource($user);
    }

    public function store(UserRequest $request)
    {
        $this->authorize('create', User::class); // If you need create authorization
        $user = User::create($request->validated());
        return new UserResource($user);
    }

    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $user->update($request->validated());
        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return response()->noContent(); // 204 No Content
    }
}
