<?php

namespace App\Modules\V1\Category\Repositories;

use App\Modules\Repository as BaseRepository;
use App\Models\V1\Category;
/**
 * Class CategoryRepository
 * @package App\Modules\V1\Category\Repositories
 */
class CategoryRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }
}