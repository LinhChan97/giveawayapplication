<?php

namespace App\Modules;

use DB;

class Service
{
    /**
     * Define repository for service
     *
     * @var Repository repository
     */
    protected $repository;

     /**
      * Service constructor
      *
      * @param Repository $repository repository
      */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
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
        return $this->repository->paginate();
    }

    /**
     * Get object by uid
     *
     * @param string $uid uid of object
     * @param mixed  $data Data
     *
     * @return mixed
     */
    public function find(string $uid)
    {
        return $this->repository->find($uid);
    }

    /**
     * Store new object
     *
     * @param array $data data
     *
     * @return mixed
     */
    public function store(array $data)
    {
        DB::beginTransaction();
        try {
            $object = $this->repository->create($data);
            $this->repository->createRelation($object, $data);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();

        return $this->find($object->id);
    }

    /**
     * Update object
     *
     * @param string  $uid          uid
     * @param array   $data          data
     *
     * @return mixed
     */
    public function update(string $uid, array $data)
    {
        DB::beginTransaction();
        try {
            $object = $this->repository->update($data, $uid);
            $this->repository->updateRelation($object, $data);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();

        return $this->find($object->id);
    }

    /**
     * Delete object
     *
     * @param string $uid uid of object
     *
     * @return mixed
     */
    public function destroy(string $uid)
    {
        DB::beginTransaction();
        try {
            $deleted = $this->repository->delete($uid);
            DB::commit();
            return $deleted;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
