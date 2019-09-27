<?php

namespace App\Modules\V1\Cause\Controllers;

use App\Modules\V1\Cause\Services\CauseService;
use App\Modules\Controller as BaseController;
use App\Modules\Request;

class CauseController extends BaseController
{
    /**
     * CauseController constructor.
     *
     * @param CauseService $CauseService CauseService
     */
    public function __construct(CauseService $CauseService)
    {
        parent::__construct($CauseService);
    }
}
