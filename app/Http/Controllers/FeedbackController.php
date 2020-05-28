<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function nhantinbaoloi(){
        return view('feedback.nhan_tin_bao_loi_he_thong');
    }
}
