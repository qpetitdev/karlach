<?php

namespace App\Models\Dtos;

use App\Interfaces\DomainModelInterface;

class UserDto implements DomainModelInterface
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public readonly ?int   $id = null,
    )
    {
    }
}
