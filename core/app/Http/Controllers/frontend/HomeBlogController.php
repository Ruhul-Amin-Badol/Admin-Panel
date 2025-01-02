<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    public function index(){
        return view('frontend.modules.blogs.index');
    }
}
