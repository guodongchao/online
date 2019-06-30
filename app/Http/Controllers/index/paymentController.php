<?php

namespace App\Http\Controllers\index;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class paymentController extends Controller
{
    public function pay(Request $request){
        return view('index.pay.paylist');
    }
}