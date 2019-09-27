<?php

namespace App\Modules\V1\Cause\Repositories;

use App\Modules\Repository as BaseRepository;
use App\Models\V1\Cause;
/**
 * Class CauseRepository
 * @package App\Modules\V1\Cause\Repositories
 */
class CauseRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cause::class;
    }
}