<?php

namespace App\Http\Controllers\index\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pageController extends Controller
{
    public function page(){
        return view("index.page.page");
    }
    public function pagecontact(){
        return view("index.page.page-contact");
    }
}