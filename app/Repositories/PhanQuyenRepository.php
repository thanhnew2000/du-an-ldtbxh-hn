<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\PhanQuyenRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PhanQuyenRepository extends BaseRepository implements PhanQuyenRepositoryInterface
{
    protected $table;
    public function getTable()
    {
        return 'role_has_permissions';
    }

    public function getQuyen()
    {
        $data = $this->table
            ->join('roles', 'roles.id', '=', 'role_has_permissions.role_id')
            ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->select(
                'role_has_permissions.*',
                'roles.name',
                DB::raw('permissions.name as permission_name')
            )->groupBy('role_has_permissions.role_id')->get();
        return $data;
    }
}