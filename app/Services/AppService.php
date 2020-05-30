<?php


namespace App\Services;
use App\Repositories\RepositoryInterface;

abstract class AppService
{
    protected $repository;

    public function __construct()
    {
        $this->setRepository();
    }
    public function getRepository(){
        $this->repository->getRepository();
    }

    public function setRepository(){
        $this->repository = app()->make(
            $this->getRepository()
        );
    }
    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById($id){
        return $this->repository->getbyId($id);
    }

    public function create($request)
    {
        $attributes = $request->all();
        //dd($attributes);
        unset($attributes['_token']);
        return $this->repository->create($attributes);
    }
    
    public function update($id, $request)
    {   
        $attributes = $request->all();
        //dd($attributes);
        unset($attributes['_token']);
        
        return $this->repository->update($id, $attributes);

    }
}
