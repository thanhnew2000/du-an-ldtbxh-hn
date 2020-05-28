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
}
