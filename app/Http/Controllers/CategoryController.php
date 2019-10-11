<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
   
    public function index()
    {
          $category=Category::get();
          return view('pages.CategoryManagement.index', compact('category'));
    }

    
    public function create()
    {
         $levels = Category::where(['parent_id' => 0])->get();
         return view('pages.CategoryManagement.create')->with(compact('levels'));
    }

    
    public function store(Request $request)
    {
        if($request->isMethod('post'))
        { 
            $category                = new Category;
            $category['name']        = $request->cat_name;
            $category['description'] = $request->cat_desc;
            $category['parent_id']   = $request->cat_level;
            $category['status']      = $request->status;
            $category->save();
        return redirect()->route('category.index')
                         ->with('success','category should be
                                 added successfully.');
        }

    }

    public function show($id)
    {   $main_catname = Category::find($id);
        $category = Category::where('parent_id','=', $id)->get();
        return view('pages.CategoryManagement.show', compact('category','main_catname'));
        
    }

   
    public function edit($id)
    {
       $category=Category::find($id);
       $levels = Category::where(['parent_id' => 0])->get();
       return view('pages.CategoryManagement.edit',compact('category','levels'));
    }

 
    public function update(Request $request, $id)
    {
        $data=$request->all();
        Category::where(['id'=>$id])->update(['name'=>$data['cat_name'],'description'=>$data['cat_desc'],'parent_id'=>$data['cat_level'],'status'=> $data['status']]);
        return redirect()->route('category.index')
                         ->with('success','Category has been 
                                updated successfully.');
    }

  
    public function destroy($id)
    {
       Category::where(['id'=>$id])->delete();
        return redirect()->route('category.index')
                         ->with('success','Category has been 
                                deleted successfully.');
    }
}
