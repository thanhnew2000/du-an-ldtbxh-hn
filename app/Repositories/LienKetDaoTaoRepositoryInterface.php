<?php

namespace App\Repositories;

interface LienKetDaoTaoRepositoryInterface
{
    public function getTongHopLienKetDaoTao($params, $limit = 20);
}
