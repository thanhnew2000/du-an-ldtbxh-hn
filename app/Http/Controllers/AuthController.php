<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;
use Mail;
class AuthController extends Controller
{
    public function login(Request $request){
    	$phone_or_email = $request->phone;
    	$password = $request->password;
    	$remember = $request->has("remember") ? true : false;

    	if(Auth::attempt(["phone_number"=>$phone_or_email,"password"=>$password],$remember)){
    		 return redirect('dashboard');
    	}else if(Auth::attempt(["email"=>$phone_or_email,"password"=>$password],$remember)){
             return redirect('dashboard');
        }else{
    		 return redirect()->back()->with('thongbao','Tài khoản hoặc mật khẩu không đúng');
    	}
    }

    public function logout(){
    	Auth::logout();
    	return redirect('/');
    }

    public function forgot_pass(Request $request){
        $email = $request->email;
        $checkUser = User::where("email",$email)->first();
        if(!$checkUser){
            return response()->json(['thongbaoloi'=>"Địa chỉ email không tồn tại"],200);
        }
        $code = bcrypt(md5(time().$email));
        $checkUser->code = $code;
        $checkUser->time_code= Carbon::now();
        $checkUser->save();
        $toemail = $checkUser->email;
        
        $url = route('link_reset_password',['code'=>$checkUser->code,'email'=>$email]);
        $data=[
            'route'=>$url
        ];
        Mail::send('email_reset_pass',$data,function($message) use ($toemail) {
            $message->to($toemail,'Reset password')->subject('Lấy lại mật khẩu');
        });

        return response()->json(['thongbaothanhcong'=>"Thành công ! Vui lòng kiểm tra email để thay đổi mật khẩu"],200);


    }
    public function reset_pass(Request $request){
        $code = $request->code;
        $email= $request->email;
        $checkUser = User::where([
            "code" => $code,
            "email" => $email
        ])->first();
        if($checkUser){
           return view('reset_pass');
        }else{
            return redirect()->back()->with('thongbao','Lỗi xác thực không thành công');         
        }
    }
    public function post_reset_pass(Request $request){
        $code = $request->code;
        $email= $request->email;
        $checkUser = User::where([
            "code" => $code,
            "email" => $email
        ])->first();

        $hethan =Carbon::parse($checkUser->time_code);
        $hientai= Carbon::now();

        // dd(!$hientai->diffInMinutes($hethan)>=1440);

        if(!$checkUser || $hientai->diffInMinutes($hethan)>=1440){
         return redirect()->back()->with('thongbao','Lỗi xác thực không thành công');
        };

        $checkUser->password = bcrypt($request->password);
        $checkUser->save();
        return redirect()->route('login')->with('success','Mật khẩu đã được thay đổi thành công, Mời bạn đăng nhập');
    }

    public function getdangkytaikhoan(){
        return view('dang_ky');
    }

    public function dangkytaikhoan(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone;
        $user->password = bcrypt($request->password);
        $user->avatar = $request->image;
        $user->save();
        $image = $request->image;
        $image->move('upload', $image->getClientOriginalName());
        return redirect()->back()->with('thongbao','Đăng ký tài khoản thành công');
    }

    public function checkemail(Request $request){
        $email = $request->name;
        $queryUser = User::where('email', $email);
        $numberEmail = $queryUser->count();
        echo $numberEmail == 0 ? "true" : "false";
    }

    public function checkphone(Request $request){
        $phone = $request->name;
        $queryUser = User::where('phone_number', $phone);
        $numberPhone = $queryUser->count();
        echo $numberPhone == 0 ? "true" : "false";
    }


}
