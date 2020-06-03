<?php


namespace App\Repositories;


interface CsdtRepositoryInterface
{
    public function getCsdt();

    /**
     * @param $id
     * @return mixed
     */
    public function getSingleCsdt($id);
}
