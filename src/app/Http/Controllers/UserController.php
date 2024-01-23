<?php

namespace App\Http\Controllers;

use App\Exceptions\ModelAlreadyExistsException;
use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        public readonly UserService $userService,
    )
    {
    }

    /**
     * @param CreateUserRequest $request
     * @return UserResource
     * @throws ModelAlreadyExistsException
     */
    public function create(CreateUserRequest $request): UserResource
    {
        $user = $this->userService->createUser(
            name: $request->get("name"),
            email: $request->get("email"),
            password: $request->get("password"),
        );

        return new UserResource($user);
    }
}
