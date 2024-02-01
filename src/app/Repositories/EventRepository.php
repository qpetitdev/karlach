<?php

namespace App\Repositories;

use App\Models\Dtos\EventDto;
use App\Models\Dtos\UserDto;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Collection;

class EventRepository
{
    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return Event::all()->map(fn($dao) => $this->mapDaoToDto($dao));
    }

    public function getById(int $id): ?EventDto
    {
        $storedEvent = Event::find($id);

        if(is_null($storedEvent)){
            return null;
        }

        return $this->mapDaoToDto($storedEvent);
    }

    /**
     * @param Event $event
     * @return EventDto
     */
    public function mapDaoToDto(Event $event): EventDto
    {
        return new EventDto(
            name: $event->name,
            description: $event->description,
            start: $event->start,
            end: $event->end,
            authorId: $event->author_id,
            id: $event->id
        );
    }
}
