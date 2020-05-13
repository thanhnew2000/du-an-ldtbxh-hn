<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
class AuthController extends Controller
{
    public function login(Request $request){
    	$phone_number = $request["phone"];
    	$password = $request["password"];
    	$remember = $request->has("remember") ? true : false;
    	if(Auth::attempt(["phone_number"=>$phone_number,"password"=>$password],$remember)){
    		 return redirect('dashboard');
    	}else{
    		 return redirect()->back()->with('thongbao','Tài khoản hoặc mật khẩu không đúng');
    	}
    }

    public function logout(){
    	Auth::logout();
    	return redirect('/');
    }
}
