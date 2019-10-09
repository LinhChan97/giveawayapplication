<?php

namespace App\Modules\V1\Charity\Repositories;

use App\Modules\Repository as BaseRepository;
use App\Models\V1\User;
use App\Models\V1\Role;

/**
 * Class CharityRepository
 * @package App\Modules\V1\Charity\Repositories
 */
class CharityRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
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
        return $this->model->join('role_user', 'role_user.user_id', 'users.id')
            ->join('roles', 'roles.id', 'role_user.role_id')
            ->where('roles.name', Role::CHARITY_ROLE)
            ->select('users.*')
            ->paginate();
    }
}