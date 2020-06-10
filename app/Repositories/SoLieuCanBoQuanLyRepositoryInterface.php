<?php

namespace App\Repositories;

interface SoLieuCanBoQuanLyRepositoryInterface
{
	public function getFilterData();
	public function getList(array $params = [], int $limit = 20);
}