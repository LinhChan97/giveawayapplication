<?php

namespace App\Modules\V1\Item\Controllers;

use App\Modules\V1\Item\Services\ItemService;
use App\Modules\Controller as BaseController;
use App\Modules\Request;

class ItemController extends BaseController
{
    /**
     * ItemController constructor.
     *
     * @param ItemService $itemService ItemService
     */
    public function __construct(ItemService $itemService)
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
        $this->service = $itemService;
    }
}
