<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MangLuoiController extends Controller
{
    public function index(){
        return view('mang-luoi.index');
    }
}
