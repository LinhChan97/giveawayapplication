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
     * @param ItemService $ItemService ItemService
     */
    public function __construct(ItemService $ItemService)
    {
        parent::__construct($ItemService);
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
