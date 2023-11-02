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
        $companies = Category::orderBy('id','desc')->paginate(5);
        return view('categories.index', compact('companies'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('categories.create');
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
            'email' => 'required',
            'address' => 'required',
        ]);
        
        Category::create($request->post());

        return redirect()->route('categories.index')->with('success','Company has been created successfully.');
    }

  
    public function show(Category $category)
    {
        return view('categories.show',compact('category'));
    }

  
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

 
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        $category->fill($request->post())->save();

        return redirect()->route('categories.index')->with('success','Company Has Been updated successfully');
    }

   
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Company has been deleted successfully');
    }
}
