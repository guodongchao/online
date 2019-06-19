<?php

namespace App\Http\Controllers\index\article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class articleController extends Controller
{
    public function article(){
        return view("index.article.article");
    }
    public function articlelist(){
        return view("index.article.articlelist");
    }
}