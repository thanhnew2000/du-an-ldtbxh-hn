<?php

namespace App\Repositories;

interface GiaoVienRepositoryInterface
{
    public function getFilterData();
    public function getList($params, $limit = 10);
}
