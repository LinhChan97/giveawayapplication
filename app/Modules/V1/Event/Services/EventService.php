<?php

namespace App\Modules\V1\Event\Services;

use App\Modules\V1\Event\Repositories\EventRepository;
use App\Modules\Service as BaseService;

class EventService extends BaseService
{
    /**
     * EventService constructor.
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
        parent::__construct($eventRepository);
    }

    /**
     * Get All object
     *
     * @param array|null $data data
     *
     * @return \Model\Eloquent\Builder
     */
    public function getAll(array $data = null)
    {
        return $this->repository->getAll();
    }

    /**
     * Get object by uid
     *
     * @param string $uid uid of object
     * @param mixed  $data Data
     *
     * @return mixed
     */
    public function find(string $uid)
    {
        return $this->repository->with(['cause', 'user'])->find($uid);
    }
}
