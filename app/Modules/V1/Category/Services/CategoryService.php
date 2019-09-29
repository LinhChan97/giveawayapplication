<?php

namespace App\Modules\V1\Category\Services;

use App\Modules\V1\Category\Repositories\CategoryRepository;
use App\Modules\Service as BaseService;

class CategoryService extends BaseService
{
    /**
     * CategoryService constructor.
     * @param CategoryRepository $CategoryRepository
     */
    public function __construct(CategoryRepository $CategoryRepository)
    {
        parent::__construct($CategoryRepository);
    }
}
