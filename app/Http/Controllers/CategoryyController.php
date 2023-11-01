<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryyController extends Controller
{
  
    public function index()
    {
        $categories = Category::orderBy('id','desc')->paginate(5);
        return view('categories.index', compact('category'));
    }

 
    public function create()
    {
        return view('categories.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            
        ]);
        
        Category::create($request->post());

        return redirect()->route('categories.index')->with('success','Category has been created successfully.');
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
            'detail' => 'required',
            
        ]);
        
        $category->fill($request->post())->save();

        return redirect()->route('categories.index')->with('success','Category Has Been updated successfully');
    }

   
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Category has been deleted successfully');
    }
}
