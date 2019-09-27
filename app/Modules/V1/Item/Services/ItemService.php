<?php

namespace App\Modules\V1\Item\Services;

use App\Modules\V1\Item\Repositories\ItemRepository;
use App\Modules\Service as BaseService;

class ItemService extends BaseService
{
    /**
     * ItemService constructor.
     * @param ItemRepository $ItemRepository
     */
    public function __construct(ItemRepository $ItemRepository)
    {
        parent::__construct($ItemRepository);
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
}
