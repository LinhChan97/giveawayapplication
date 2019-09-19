<?php

namespace App\Modules;

use Illuminate\Routing\Controller as BaseController;
use App\Shared\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    use ApiResponser;
    
    /**
     * Define service for controller
     *
     * @var Service
     */
    protected $service;

     /**
      * Controller constructor
      *
      * @param Service $service service
      */
    public function __construct(Service $service)
    {
        $this->middleware('auth:api');
        $this->service = $service;
    }

    /**
     * Get all objects
     *
     * @param Request $request request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $data = $this->service->getAll($request->all());

        return $this->setDataPaginated($data->toArray())
            ->setMeta(__('messages.request_success'))
            ->jsonOut();
    }

    /**
     * Show object by uid
     *
     * @param int  $uid      uid of object
     * @param Request $request request
     *
     * @return mixed
     */
    public function show(int $uid, Request $request)
    {
        $object = $this->service->find($uid, $request->all());

        return $this->setData($object)
            ->setMeta(__('messages.request_success'))
            ->jsonOut();
    }

    /**
     * Store object
     *
     * @param Request $request request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $object = $this->service->store($request->all());

        return $this->setData($object)
            ->setStatus(JsonResponse::HTTP_CREATED)
            ->setMeta(__('messages.request_success'))
            ->jsonOut();
    }

    /**
     * Edit object
     *
     * @param int  $uid    uid
     * @param Request $request request
     *
     * @return mixed
     */
    public function update(int $uid, Request $request)
    {
        $object = $this->service->update($uid, $request->all());

        return $this->setData($object)
            ->setStatus(JsonResponse::HTTP_OK)
            ->setMeta(__('messages.request_success'))
            ->jsonOut();
    }

    /**
     * Delete object
     *
     * @param int $uid uid of object
     *
     * @return mixed
     */
    public function destroy(int $uid)
    {
        $this->service->destroy($uid);
        
        return $this->setStatus(JsonResponse::HTTP_NO_CONTENT)
        ->setMeta(__('messages.request_success'))
        ->jsonOut();
    }
}
