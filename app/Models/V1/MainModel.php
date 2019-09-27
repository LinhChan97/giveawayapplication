<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Http\Request;
use App\Shared\Traits\Timezone;
use Auth;

class MainModel extends EloquentModel
{
    use Timezone;

    const PUBLIC_STATUS = 0;
    const PRIVATE_STATUS = 1;
    const LIST_STATUS = [self::PUBLIC_STATUS, self::PRIVATE_STATUS];

    //define per page for paginator
    protected $perPage = 20;

    public $order = 'updated_at';
    public $orderMethod = 'desc';

    public $order2nd = 'updated_at';
    public $orderMethod2nd = 'desc';

    public $searchValue = '';
    protected $searchField = 'created_at';

    protected $sortMethods = [
        'desc',
        'asc'
    ];

    protected $alias = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pivot', 'deleted_at'
    ];

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes Attributes
     *
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        # Get and set limit per page from query URL
        $request = app(Request::class);
        if (is_numeric($request->get('per_page'))) {
            $this->setPerPage((int) $request->get('per_page'));
        }
    }

    /**
     * Set Search
     *
     * @param Request $request search request
     *
     * @return void
     */
    public function setSearch(Request $request)
    {
        $stringSearch = $request->get('q');
        if (!empty($stringSearch)) {
            $this->setSearchValue(trim($stringSearch));
        }
    }
    /**
     * Set search value
     *
     * @param string|null $searchValue
     *
     * @return void
     */
    public function setSearchValue(string $searchValue = null)
    {
        $this->searchValue = $searchValue ? $searchValue : $this->searchValue;
    }

    /**
     * Set Sort
     *
     * @param Request $request Sort request
     *
     * @return void
     */
    public function setSort(Request $request)
    {
        $stringSort = $request->get('sort');
        if (!empty($stringSort)) {
            $split = explode(',', $stringSort);
            $order = $split[0];
            $method = isset($split[1]) ? $split[1] : null;
            if (in_array($order, $this->fillable)) {
                $this->setOrder($this->table.".".$order);
            } elseif (in_array($order, $this->alias)) {
                $this->setOrder($order);
            }
            $this->setOrderMethod($method);
        }
    }

    /**
     * Set order method
     *
     * @param string|null $orderMethod order method
     *
     * @return void
     */
    public function setOrderMethod(string $orderMethod = null)
    {
        $this->orderMethod = $orderMethod ? $orderMethod : $this->orderMethod;
    }

    /**
     * Set order
     *
     * @param string $order order
     *
     * @return void
     */
    public function setOrder(string $order = null)
    {
        $this->order = $order;
    }

    /**
     * Scope query order
     *
     * @param Builder $query QueryBuilder
     *
     * @return Builder
     */
    public function scopeQueryOrder($query)
    {
        $request = app(Request::class);
        $this->setSort($request);
        return $query->orderBy($this->order, $this->orderMethod)
                    ->orderBy($this->order2nd, $this->orderMethod2nd);
    }

    /**
     * Scope query order
     *
     * @param Builder $query QueryBuilder
     *
     * @return Builder
     */
    public function scopeQuerySearch($query)
    {
        $request = app(Request::class);
        $this->setSearch($request);

        $searchValue = $this->searchValue;
        $searchField = $this->searchField;
        
        if (!empty($searchValue)) {
            return $query->where(function ($query) use ($searchValue, $searchField) {
                $query->where($searchField, 'LIKE', "%$searchValue%");
            });
        }

        return $query;
    }

    /**
     * Scope query order
     *
     * @param Builder $query QueryBuilder
     *
     * @return Builder
     */
    public function scopeQueryFilter($query)
    {
        $request = app(Request::class);

        $filterArray = $request->get('filters');
        if (!empty($filterArray)) {
            foreach ($filterArray as $filter) {
                $split = explode(',', $filter);
                if (count($split) == 2) {
                    $key = $split[0];
                    $value = $split[1];
                    $query = $query->where($key, $value);
                }
            }
        }
        return $query;
    }
}
