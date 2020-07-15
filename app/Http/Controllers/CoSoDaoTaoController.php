<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoSoDaoTaoController extends Controller
{
    public function index(){
        return view('co-so-dao-tao.index');
    }
}
