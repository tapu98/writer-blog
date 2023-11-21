<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        $blogs = Blog::latest()->limit(10)->get();;
        return view('frontend.pages.home',compact('blogs'));
    }
    public function about(){
        return view('frontend.pages.about');
    }
    public function post(){
        $blogs = Blog::orderBy('id','desc')->paginate(5);
        return view('frontend.pages.post',compact('blogs'));
    }
    public function contact(){
        return view('frontend.pages.contact');
    }
    
}
