<?php

namespace App\Http\Controllers\index\question;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class questionController extends Controller
{
    public function question1(Request $request){
        return view("index.question.question1");
    }

}