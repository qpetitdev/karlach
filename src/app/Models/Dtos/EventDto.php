<?php

namespace App\Models\Dtos;

use App\Interfaces\DomainModelInterface;
use Carbon\Carbon;

class EventDto implements DomainModelInterface
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly Carbon $start,
        public readonly Carbon $end,
        public readonly int    $authorId,
        public readonly ?int   $id = null,
    )
    {
    }
}
