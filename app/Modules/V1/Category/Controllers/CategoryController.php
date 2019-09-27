<?php

namespace App\Modules\V1\Category\Controllers;

use App\Modules\V1\Category\Services\CategoryService;
use App\Modules\Controller as BaseController;
use App\Modules\Request;

class CategoryController extends BaseController
{
    /**
     * CategoryController constructor.
     *
     * @param CategoryService $CategoryService CategoryService
     */
    public function __construct(CategoryService $CategoryService)
    {
        parent::__construct($CategoryService);
    }
}
