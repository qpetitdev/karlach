<?php

namespace App\Repositories;

use App\Models\Dtos\UserDto;
use App\Models\User;

class UserRepository
{
    /**
     * @param string $key
     * @param string $operator
     * @param string $value
     * @return mixed
     */
    public function exists(string $key, string $operator, string $value)
    {
        return User::where($key, $operator, $value)->exists();
    }

    /**
     * @param UserDto $dto
     * @return UserDto
     */
    public function create(UserDto $dto):UserDto
    {
        $user = User::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => bcrypt($dto->password),
        ]);

        return $this->mapDaoToDto($user);
    }

    /**
     * @param User $user
     * @return UserDto
     */
    public function mapDaoToDto(User $user): UserDto
    {
        return new UserDto(
            name: $user->name,
            email: $user->email,
            password: $user->getAuthPassword(),
            id: $user->id
        );
    }
}
