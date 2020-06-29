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
use Spatie\Permission\Models\Role;

class AccountController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->has('keyword') ? $request->keyword : null;
        $keyword = trim($keyword);
        $status = $request->has('status') ? $request->status : null;
        $role = $request->has('role') ? $request->role : null;
        $params = $request->all();
        // 2020-06-29 - ThienTH - lấy danh sách roles
        $roleList = Role::all();

        if (!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');
        $route_name = Route::current()->action['as'];


        $userQuery = DB::table('users')
            ->leftjoin('co_so_dao_tao', 'users.co_so_dao_tao_id', '=', 'co_so_dao_tao.id')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->select(   'users.*',
                                DB::raw('co_so_dao_tao.ten as ten'),

                                DB::raw('model_has_roles.role_id as user_role'),
                                DB::raw('roles.name as role_name'));

        if(!empty($keyword)){
            $userQuery->where(function ($query) use ($keyword) {
                $query->where('users.name', 'like', '%' . $keyword . '%')
                    ->orWhere('users.phone_number', 'like', '%' . $keyword . '%')
                    ->orWhere('users.email', 'like', '%' . $keyword . '%');
            });
        }

        if(!empty($status)){
            $userQuery->where('users.status', '=', $status);
        }
        if(!empty($role)){
            $userQuery->where('model_has_roles.role_id', '=', $role);
        }

        $users = $userQuery->paginate($params['page_size']);
        $users->appends(request()->input())->links();

        return view('account.list_account', compact('users', 'keyword',
                                                                'status', 'role', 'params',
                                                                'route_name', 'roleList'));
    }

    public function create()
    {
        return view('account.create_account');
    }

    public function store(RegisterAccount $request)
    {
    }

    public function edit($id)
    {
        $user = User::find($id);
        $data = DB::table('roles')->get();
        return view('account.edit_account', [
            'data' => $data,
            'user' => $user
        ]);
    }

    public function updateID(UpdateAccountId $request)
    {
        $id = $request->id;
        $name = $request->name;
        $phone = $request->phone;
        $user = User::find($id);
        $user->name = $name;
        $user->phone_number = $phone;
        $user->roles()->sync(['role_id' => $request->role]);
        $user->save();
        return redirect()->back()->with('thongbao', 'Cập nhật thành công !');
    }

    public function editstatus(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);

        if ($user->status == 1) {
            $user->status = 2;
        } else {
            $user->status = 1;
        }

        $user->save();
    }


    public function checkEmailUpdate(Request $request)
    {
    }



    public function checkName(Request $request)
    {

        $name = $request->name;
        $pattern = '/^[\pL\s\-]+$/u';
        $kq = preg_match($pattern, $name);
        echo $kq == 1 ? "true" : "false";
    }
}