<?php

namespace App\Services;

use App\Exceptions\ModelAlreadyExistsException;
use App\Models\Dtos\UserDto;
use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    public function __construct(
        public readonly UserRepository $userRepository
    )
    {
    }


    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return UserDto
     * @throws ModelAlreadyExistsException
     */
    public function createUser(
        string $name,
        string $email,
        string $password
    ): UserDto
    {
        if ($this->userRepository->exists("email", "=", $email)) {
            throw new ModelAlreadyExistsException("User with $email already exists.");
        }

        return $this->userRepository->create(
            new UserDto(
                name: $name,
                email: $email,
                password: $password,
            )
        );
    }


}
