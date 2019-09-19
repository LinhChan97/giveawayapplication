<?php

namespace App\Modules;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

/**
 * Class UserRepository
 *
 * @package namespace App\Modules;
 */
class Repository extends BaseRepository
{
     /**
      * Specify Model class name
      *
      * @var Model
      */
    protected $model;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return $this->model;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Retrieve all data of repository, paginated
     *
     * @param null $limit
     * @param array $columns
     * @param string $method
     *
     * @return mixed
     */
    public function paginate($limit = null, $columns = ['*'], $method = "paginate")
    {
        $class = $this->model();
        $model  = new $class();
        $this->applyCriteria();
        $this->applyScope();
        $limit = is_null($limit) ? $model->getPerPage() : $limit;
        $results = $this->model->querySearch();
        $results = $this->model->queryOrder();
        $results = $this->model->{$method}($limit, $columns);
        $results->appends(app('request')->query());
        $this->resetModel();

        return $this->parserResult($results);
    }
}
