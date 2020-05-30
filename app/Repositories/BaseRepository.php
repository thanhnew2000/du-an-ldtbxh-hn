<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    //model muốn tương tác
    //protected $model;

    //Table muon tuong tac
    protected $table;

   //khởi tạo 
    public function __construct()
    {
        $this->setTable();
        //dd($this->setTable());
    }

    //lấy table tương ứng
    abstract public function getTable();

    /**
     * Set model
     */
    public function setTable()
    {   //dd($this->getTable());
        // $this->model = app()->make($this->getModel());
        return $this->table = DB::table($this->getTable());


    }
    
    public function getAll()
    {      
        $result =  $this->table->get();
        return $result;
    }
    
    public function findById($id)
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