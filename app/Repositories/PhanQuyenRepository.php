<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;
use App\Repositories\BaseRepository;



class PhanQuyenRepository extends AppRepository
{

    protected $fieldSearchable = [
        'name',
        'permissions'
    ];


    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Role::class;
    }
}