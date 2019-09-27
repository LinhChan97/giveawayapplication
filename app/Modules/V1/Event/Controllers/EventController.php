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
        parent::__construct($eventService);
    }

    /**
     * Get all objects
     *
     * @param App\Modules\Request $request request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $data = $this->service->getAll($request->all());

        return $this->setData($data)
            ->setMeta(__('messages.request_success'))
            ->jsonOut();
    }
}
