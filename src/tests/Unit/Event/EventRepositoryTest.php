<?php

namespace Tests\Unit\Event;

use App\Models\Dtos\EventDto;
use App\Models\Event;
use App\Repositories\EventRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class EventRepositoryTest extends TestCase
{
    private EventRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call("migrate:fresh");
        $this->repository = App::make(EventRepository::class);
    }

    public function test_it_should_list_all_events()
    {
        $count = rand(1,10);
        $events = Event::factory($count)->create();

        $result = $this->repository->list();

        $this->assertInstanceOf(Collection::class,$result);
        $this->assertCount($count,$result);
        $this->assertInstanceOf(EventDto::class,$result->first());
    }
}
