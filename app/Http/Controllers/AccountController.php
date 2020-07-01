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
use App\Services\AccountService;

class AccountController extends Controller
{

    protected $AccountService;

    public function __construct(
        AccountService $AccountService)
    {
        $this->AccountService = $AccountService;
    }

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

        $users = $this->AccountService->getAllAccounts($keyword,$status,$role,$params);
        $users->appends(request()->input())->links();

        return view('account.list_account', compact('users', 'keyword',
                                                                'status', 'role', 'params',
                                                                'route_name', 'roleList'));
    }

    public function create()
    {
        return view('account.create_account');
    }


    public function edit($id)
    {
        $check_account = $this->AccountService->findById($id);
        if (!$check_account) {
            return redirect()->route('account.list');
        }
        $user = $this->AccountService->getAccountAndRole($id);
        $data = $this->AccountService->getAllRoles();
       
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


    public function checkName(Request $request)
    {

        $name = $request->name;
        $pattern = '/^[\pL\s\-]+$/u';
        $kq = preg_match($pattern, $name);
        echo $kq == 1 ? "true" : "false";
    }
}