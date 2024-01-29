<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventController extends Controller
{
    public function __construct(
        private readonly EventService $eventService
    )
    {
    }

    public function index():AnonymousResourceCollection
    {
        //TODO
    }

    public function show():AnonymousResourceCollection
    {
        //TODO
    }

    public function create():AnonymousResourceCollection
    {
        //TODO
    }

    public function update():AnonymousResourceCollection
    {
        //TODO
    }

    public function delete():AnonymousResourceCollection
    {
        //TODO
    }
}
