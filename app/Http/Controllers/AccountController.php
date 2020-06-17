<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Str;
use Hash;
use Storage;
use App\Http\Requests\ResetPassWord;
use App\Http\Requests\RegisterAccount;
use App\Http\Requests\UpdateAccount;
use App\Http\Requests\UpdateAccountId;
use Illuminate\Support\Facades\Route;
class AccountController extends Controller
{
    
    public function index(Request $request){
        $keyword = $request->has('keyword') ? $request->keyword : null;
        $keyword = trim($keyword);
        $status = $request->has('status') ? $request->status : null;
        $role = $request->has('role') ? $request->role : null;
        $params = $request->all();
        if(!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');
        $route_name = Route::current()->action['as'];
    
        if($keyword == null && $status == null && $role == null){

            $users = DB::table('users')
            ->leftjoin('co_so_dao_tao', 'users.co_so_dao_tao_id', '=', 'co_so_dao_tao.id')
            ->join('model_has_roles', 'users.id' , '=' , 'model_has_roles.model_id')
            ->join('roles', 'roles.id','=','model_has_roles.role_id')
            ->select('users.*', DB::raw('co_so_dao_tao.ten as ten'), DB::raw('roles.name as role_name'))
            // ->get();
            // ->toSql();
            ->paginate($params['page_size']);

            // dd($users);
  
        }else{

            if($status === null && $role === null){
                $users = DB::table('users')
               ->leftjoin('co_so_dao_tao', 'users.co_so_dao_tao_id', '=', 'co_so_dao_tao.id')
               ->select('users.*', DB::raw('co_so_dao_tao.ten as ten'))
                ->where([
                    ['name', 'like', '%'.$keyword.'%']
                ])
                ->orWhere([
                    ['phone_number', 'like', '%'.$keyword.'%']
                ])
                ->orWhere([
                    ['ten', 'like', '%'.$keyword.'%']
                ])
                ->orWhere([
                    ['email', 'like', '%'.$keyword.'%']
                ])
                ->paginate($params['page_size']);
           } else if($status !== null && $role === null){
               $users = DB::table('users')
               ->leftjoin('co_so_dao_tao', 'users.co_so_dao_tao_id', '=', 'co_so_dao_tao.id')
               ->select('users.*', DB::raw('co_so_dao_tao.ten as ten'))
                ->where([
                    ['status', '=', $status],
                    ['name', 'like', '%'.$keyword.'%']
                ])
                ->orWhere([
                    ['status', '=', $status],
                    ['phone_number', 'like', '%'.$keyword.'%']
                ])
                ->orWhere([
                    ['status', '=', $status],
                    ['ten', 'like', '%'.$keyword.'%']
                ])
                ->orWhere([
                    ['status', '=', $status],
                    ['email', 'like', '%'.$keyword.'%']
                ])
                ->paginate($params['page_size']);


           } else if($status === null && $role !== null){
               $users = DB::table('users')
               ->leftjoin('co_so_dao_tao', 'users.co_so_dao_tao_id', '=', 'co_so_dao_tao.id')
               ->select('users.*', DB::raw('co_so_dao_tao.ten as ten'))
                ->where([
                   
                    ['name', 'like', '%'.$keyword.'%']
                ])
                ->orWhere([
                    
                    ['phone_number', 'like', '%'.$keyword.'%']
                ])
                ->orWhere([
                    
                    ['ten', 'like', '%'.$keyword.'%']
                ])
                ->orWhere([

                    ['email', 'like', '%'.$keyword.'%']
                ])
                ->paginate($params['page_size']);
     
       
           }else{
            $users = DB::table('users')
            ->leftjoin('co_so_dao_tao', 'users.co_so_dao_tao_id', '=', 'co_so_dao_tao.id')
            ->select('users.*', DB::raw('co_so_dao_tao.ten as ten'))
             ->where([
                 ['status', '=', $status],
                 //them role
                 ['name', 'like', '%'.$keyword.'%']
             ])
             ->orWhere([
                 ['status', '=', $status],
                 //them role
                 ['phone_number', 'like', '%'.$keyword.'%']
             ])
             ->orWhere([
                ['status', '=', $status],
                //them role
                ['ten', 'like', '%'.$keyword.'%']
            ])
            ->orWhere([
                ['status', '=', $status],
                //them role
                ['email', 'like', '%'.$keyword.'%']
            ])
             ->paginate($params['page_size']);
       
       
           }
            $users->withPath("?status=$status&role=$role&keyword=$keyword");                  
            $soluong = $users->count();
            if($soluong < 1){
                return view('account.list_account',compact('users','keyword','status','role','params','route_name'),['thongbao'=>'Không tìm thấy kết quả !']);
            }
        }
                return view('account.list_account',compact('users','keyword','status','role','params','route_name'),['thongbao'=>'']);
    }

    public function create(){
        return view('account.create_account');
    }

    public function store(RegisterAccount $request){

    }

    public function edit($id){
        $user = User::find($id);
        $data = DB::table('roles')->get();
        return view('account.edit_account',['data'=>$data,
                                            'user'=>$user]);
    }
    
    public function updateID( UpdateAccountId $request){
        $id = $request->id;
        $name = $request->name;
        $phone = $request->phone;
        $user = User::find($id);
        $user->name = $name;
        $user->phone_number = $phone;
        $user->roles()->sync(['role_id'=> $request->role]);
        $user->save();
        return redirect()->back()->with('thongbao','Cập nhật thành công !');

    }

    public function editstatus(Request $request){   
        $id = $request->id;
        $user = User::find($id);

        if($user->status == 1){
            $user->status = 2;
        }else{
            $user->status = 1;
        }

        $user->save();  
    }


    public function checkEmailUpdate(Request $request){


    }



    public function checkName(Request $request){

        $name = $request->name;
        $pattern = '/^[\pL\s\-]+$/u';
        $kq = preg_match($pattern, $name);
        echo $kq == 1 ? "true" : "false";

    
    }


}