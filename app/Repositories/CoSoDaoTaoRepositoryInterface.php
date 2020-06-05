<?php


namespace App\Repositories;


interface CoSoDaoTaoRepositoryInterface
{
    public function getCsdt($params);

    /**
     * @param $id
     * @return mixed
     */
    public function getSingleCsdt($id);
}
