<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
   
    public function index()
    {
       if (! Gate::allows('category-list')) {
            return abort(401);
        }
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

           $validator = Validator::make($request->all(), [
            'categoryname'            => 'required',
            'categorylevel'           => 'required',
            'categorydescription'     => 'required',
            'status'                  => 'required',
         ],
          [
          'categoryname.required'=>'This field is required .',
          'categorylevel.required'=>'This field is required .',
          'categorydescription.required'=>'This field is required .',
          'status.required'=>'This field is required .',          
          ]
       );

        if ($validator->fails()) {
                  return redirect('category/create')
                        ->withErrors($validator)
                        ->withInput();
        }
            $category                = new Category;
            $category['name']        = $request->categoryname;
            $category['description'] = $request->categorydescription;
            $category['parent_id']   = $request->categorylevel;
            $category['status']      = $request->status;
            $category->save();
         
          return redirect()->route('category.index')
                         ->with('success','category should be
                                 added successfully.');
         }

    }

    public function show($id)
    {  
        $main_catname = Category::find($id);
        $category = Category::where('parent_id','=', $id)->get();
        return view('pages.CategoryManagement.show', compact('category','main_catname'));
        
    }

    public function edit($id)
    {
      try {
            $category=Category::findOrFail($id);
           } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
          }
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

    public function render($request, Exception $exception)
   {
    if ($exception instanceof CustomException) {
        return response()->abort(403, 'Unauthorized action.');
      }

    return parent::render($request, $exception);
   }
}
