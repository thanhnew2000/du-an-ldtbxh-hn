<?php


namespace App\Repositories;


use Illuminate\Support\Facades\DB;
use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->setTable();
    }

    abstract public function getTable();

    public function setTable(){
    $this->table = DB::table($this->getTable());
//        dd($this->table);
    }

    public function getAll()
    {
        $result =  $this->table->get();
        return $result;
    }
    public function getById($id)
    {
        $result = $this->table->find($id);

        return $result;
    }

    public function create($attributes = [])
    {
        $result  = $this->table->insert($attributes);
        return $result;
    }

    public function update($id, $attributes = [])
    {
        // dd($attributes);
        return $this->table
            ->where('id',$id)
            ->update($attributes);
    }

    public function delete($id)
    {
        return $this->table->where('id',$id)->delete();
    }
}
