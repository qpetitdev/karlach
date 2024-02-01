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

    public function test_it_should_get_a_specific_event(){
        $event = Event::factory()->create();

        $result = $this->repository->getById($event->id);

        $this->assertInstanceOf(EventDto::class,$result);
        $this->assertEquals($event->name,$result->name);
        $this->assertEquals($event->description,$result->description);
        $this->assertEquals($event->start,$result->start);
        $this->assertEquals($event->end,$result->end);
        $this->assertEquals($event->author_id,$result->authorId);
    }

    public function test_it_should_return_null_on_get_unknown_event()
    {
        $result = $this->repository->getById(3948);

        $this->assertNull($result);
    }
}
