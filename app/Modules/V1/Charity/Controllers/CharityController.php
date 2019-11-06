<?php

namespace App\Modules\V1\Charity\Controllers;

use App\Modules\V1\Charity\Services\CharityService;
use App\Modules\Controller as BaseController;
use App\Modules\Request;

class CharityController extends BaseController
{
    /**
     * CharityController constructor.
     *
     * @param CharityService $charityService CharityService
     */
    public function __construct(CharityService $charityService)
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
        $this->service = $charityService;
    }
}
