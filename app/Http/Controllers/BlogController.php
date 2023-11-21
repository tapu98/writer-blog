<?php

namespace App\Http\Controllers;

use App\Mail\Tapu;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
       /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        
        $blogs = Blog::with('category')->orderBy('id', 'desc')->paginate(5);
    
        return view('backend.blog.index', compact('blogs'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $categories = Category::get();
        return view('backend.blog.create',compact('categories'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {   
        
     
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'description' => 'required',
            'category' => 'required',           
        ]);
        Blog::create([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'category' => $request->category,
        ]);
        
        // Blog::create($request->post());        
        return redirect()->route('blog.index')->with('success', 'Blog has been created successfully');        

    }

  
    public function show(Blog $blog)
    {
        return view('blog.show',compact('blog'));
    }

  
    public function edit($id)
    {
        $blog = Blog::where('id',$id)->first();
        return view('backend.blog.edit',compact('blog'));
    }

 
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'description' => 'required',    
            
        ]);
        
        $blog->fill($request->post())->save();

        return redirect()->route('blog.index')->with('success','Blog Has Been updated successfully');
    }

   
    public function destroy( $id)
    {
        Blog::where('id',$id)->delete();
        return redirect()->route('blog.index')->with('success','Blog has been deleted successfully');
    }

    public function email()
{
    
    $recipientEmail = 'leo@nogorsolutions.com';    
    Mail::to($recipientEmail)->send(new Tapu());    
    if (Mail::failures()) {        
        return "Error sending email";
    }    
    return "Email sent successfully";
}
}
