<?php

namespace App\Modules\V1\Event\Controllers;

use App\Modules\V1\Event\Services\EventService;
use App\Modules\Controller as BaseController;
use App\Modules\Request;

class EventController extends BaseController
{
    /**
     * EventController constructor.
     *
     * @param EventService $eventService eventService
     */
    public function __construct(EventService $eventService)
    {
        $this->middleware('auth:api', ['except' => ['index']]);
        $this->service = $eventService;
    }
}
