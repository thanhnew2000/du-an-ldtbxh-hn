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

class AccountController extends Controller
{
    
    public function index(){
        $users = User::paginate(10);
        return view('account.list_account',compact('users'));
    }

    public function create(){
        return "create account";
    }

    public function store(Request $request){
        return "store account";
    }

    public function edit($id){
    dd($id);
    }

    public function update(Request $request){
        return "update account";
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


    public function destroy($id){
        $user = User::find($id);
        $user->delete();
    }
}
