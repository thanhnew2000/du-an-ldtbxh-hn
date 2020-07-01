<?php


namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\DotRepository;
use App\Services\AppService;
use Illuminate\Support\Facades\DB;

class DotService extends AppService
{
    public function getRepository()
    {
        return \App\Repositories\DotRepository::class;
    }

    public function index(){
        return $this->repository->index();
    }
    
    public function createDot($arrayAdd){
        return $this->repository->createDot($arrayAdd);
    }
    public function findById($id){
        $data = DB::table('dot')->where('id', $id)->first();
         return $data;
    }

    public function updateDot($arrayData,$id){
        $data = $arrayData->all();
         unset($data['_token']);
          $this->repository->updateDot($data, $id);
    }
}
?>