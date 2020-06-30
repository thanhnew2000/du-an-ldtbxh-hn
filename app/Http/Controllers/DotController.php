<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DotService;
use App\Http\Requests\Dot\RequestDot;

class DotController extends Controller
{
    protected $DotService;
    public function __construct(DotService $DotService)
    {
       $this->DotService = $DotService;
    }
    public function index(){
        $params = request()->all();
        if(isset(request()->page_size)){
            $limit = request()->page_size;
        }else{
            $limit = 20;
        }
        $data = $this->DotService->index($limit);
        return view('dot.index',
        [
        'data' => $data,
        'limit' => $limit,
        'params' => $params
        ]);
    }
    public function addForm(){
        return view('dot.add');
    }
    public function addSubmit(RequestDot $request){
        $time_start = $request->time_start;
        $time_end = $request->time_end;
        $mo_ta = $request->mo_ta;
        $arrayAdd = [
            'time_start'=>$time_start,
            'time_end'=>$time_end,
            'mo_ta'=>$mo_ta,
        ];
        $this->DotService->createDot($arrayAdd);
        return redirect()->route('view-index-dot');
    }
    public function editForm($id){
        $data = $this->DotService->findById($id);
       return view('dot.edit',compact('data'));
    }
    
    public function update(RequestDot $request,$id){
        $this->DotService->updateDot($request,$id);
        return redirect()->route('view-index-dot');
    }

    public function delete($id){
        $data = $this->DotService->delete($id);
        return redirect()->route('view-index-dot');
    }

}
