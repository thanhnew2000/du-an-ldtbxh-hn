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
            'route'=>$url,
            'title'=>"Lấy lại mật khẩu"
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

        $checkUser->password = Hash::make($request->password);
        $checkUser->email_verified_at = Carbon::now();
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
        $user->avatar = "user.png";
        $code = bcrypt(md5(time().$request->email));
        $user->password=bcrypt(md5(time().$request->email));
        $user->code = $code;
        $user->time_code= Carbon::now();
        $user->save();
        $email = $user->email;
        $url = route('link_reset_password',['code'=>$user->code,'email'=>$email]);
        $data=[
            'route'=>$url,
            'title'=>"Tài khoản được đăng ký thành công"
        ];
        Mail::send('email_dang_ky',$data,function($message) use ($email) {
            $message->to($email,'Reset password')->subject('Bạn đã được đăng ký tài khoản');
        });
        return redirect()->back()->with('thongbao','Đăng ký tài khoản thành công');
    }

    public function checkemail(Request $request){
        $email = $request->name;
        $queryUser = User::where('email', $email);
        $id = isset($request->id) ? $request->id : -1;
        if($id != -1){
	        $queryUser->where('id', '!=', $id);
        }
        
        $numberEmail = $queryUser->count();
        echo $numberEmail == 0 ? "true" : "false";
    }

    public function checkphone(Request $request){
        $phone = $request->name;
        $queryUser = User::where('phone_number', $phone);
        $id = isset($request->id) ? $request->id : -1;
        if($id != -1){
	        $queryUser->where('id', '!=', $id);
        }
        $numberPhone = $queryUser->count();
        echo $numberPhone == 0 ? "true" : "false";
    }

    public function getdoimatkhau(){
        $user = Auth::user();
        $email= $user->email;
        return view('doi_mat_khau', compact('email'));
    }

    public function doimatkhau(Request $request){
        $user = Auth::user();
        if(!Hash::check($request->password_old, $user->password)){
            return redirect()->back()->with('thongbaoloi','Xác nhận mật khẩu không chính xác');
        }
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::logout();
        return redirect()->route('login')->with('success','Mật khẩu đã được thay đổi thành công, Mời bạn đăng nhập');
    }


    public function getcapnhattaikhoan(){
        $user = Auth::user();
        return view('cap_nhat_tai_khoan',  compact('user'));
    }

    public function capnhattaikhoan(Request $request){
        $user = Auth::user();
        if(!Hash::check($request->password, $user->password)){
            return redirect()->back()->with('thongbaoloi','Xác nhận mật khẩu không chính xác');
        }
        $user->email=$request->email;
        $user->phone_number=$request->phone;
        $user->name=$request->name;
        $get_avatar =$request->file("avatar");
        if($get_avatar){
            $new_avatar=Str::random(40).'.'.$get_avatar->getClientOriginalExtension();
            $get_avatar->move("uploads/avatars",$new_avatar);
        }else{
            $new_avatar = $user->avatar;
        }
        $user->avatar=$new_avatar;
        $user->save();
        return redirect()->back()->with('thongbao','Cập nhật tài khoản thành công');
    }


}
