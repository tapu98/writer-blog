<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
      /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $categories = Category::orderBy('id','desc')->paginate(5);
        return view('backend.category.index', compact('categories'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('backend.category.create');
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
            'detail' => 'required',           
        ]);
        
        Category::create($request->post());        
        return redirect()->route('category.index')->with('success', 'Category has been created successfully');        

    }

  
    public function show(Category $category)
    {
        return view('category.show',compact('category'));
    }

  
    public function edit($id)
    {        
       $category = Category::where('id',$id)->first();
        return view('backend.category.edit',compact('category'));
    }

 
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',            
        ]);
        
        $category->fill($request->post())->save();

        return redirect()->route('category.index')->with('success','Category Has Been updated successfully');
    }

   
    public function destroy( $id)
    {
        Category::where('id',$id)->delete();
        return redirect()->route('category.index')->with('success','Category has been deleted successfully');
    }
}
