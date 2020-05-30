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

class AccountController extends Controller
{
    
    public function index(){
        $users = User::paginate(10);
        return view('account.list_account',compact('users'));
    }

    public function create(){
        return view('account.create_account');
    }

    public function store(RegisterAccount $request){
    

    }

    public function edit($id){
    $user = User::find($id);
    return view('account.edit_account',compact('user'));
    }



    public function updateID(Request $request){
        $id = $request->id;
        $this->validate($request, [
            "email" => 'required|email|unique:users,email,'.$id,
            "phone" => 'required|numeric|digits_between:10,12',
            // "name"  => 'required|alpha'
            'name'  => 'required|regex:/^[\pL\s\-]+$/u|min:6|max:40',
        ],[
            "email.required" => 'Vui lòng nhập Email',
            "email.email" => 'Email không hợp lệ',
            "email.unique" => 'Email đã tồn tại',

            "phone.required" => 'Vui lòng nhập Số điện thoại',
            "phone.digits_between" => 'Số điện thoại 10 đến 12 số',
            "phone.numeric" => 'Số điện thoại không hợp lệ',

            "name.required" => 'Vui lòng nhập Họ và Tên',
            // "name.alpha" => 'Họ và Tên không hợp lệ'
            'name.regex' => 'Vui lòng nhập đúng Họ và Tên',
            'name.min' => 'Họ tên ít nhất 6 ký tự',  
            'name.max' => 'Họ tên không được vượt quá 40 ký tự'
        ]);

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $user = User::find($id);

        $user->name = $name;
        $user->email = $email;
        $user->phone_number = $phone;

        $user->save();
        return redirect()->back()->with('thongbao','Cập nhật thành công !');
        // return redirect()->route('account.list');


    }

    public function editstatus(Request $request){   
        $id = $request->id;
        $user = User::find($id);

        if($user->status == 1){
            $user->status = 0;
        }else{
            $user->status = 1;
        }

        $user->save();  
    }


    public function checkEmailUpdate(Request $request){


        

    }



}
