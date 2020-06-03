<?php

namespace App\Services;

use Carbon\Carbon;

use App\Repositories\RepositoryInterface;

abstract  class AppService
{
    //Repositry muon tuong tac
    protected $repository;

    //Khoi tao Repository
    public function __construct()
    {
        $this->setRepository();
    }

    //Lay repository tuong ung
    public function getRepository()
    {
        return $this->repository->getRepository();
    }

    public function setRepository()
    {
        $this->repository = app()->make(
            $this->getRepository()
        );
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function findById($id)
    {
        return $this->repository->findById($id);
    }

    public function create($request)
    {
        $attributes = $request->all();
        unset($attributes['_token']);
        return $this->repository->create($attributes);
    }

    public function update($id, $request)
    {
        $attributes = $request->all();
        unset($attributes['_token']);

        return $this->repository->update($id, $attributes);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
