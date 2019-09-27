<?php

namespace App\Modules\V1\Item\Repositories;

use App\Modules\Repository as BaseRepository;
use App\Models\V1\Item;
/**
 * Class ItemRepository
 * @package App\Modules\V1\Item\Repositories
 */
class ItemRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Item::class;
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
        return $this->model->with(['category'])->get();
    }
}