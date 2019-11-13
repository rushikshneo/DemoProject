<?php

namespace App\Http\Controllers;
use App\productattribute;
use App\Category;
use Illuminate\Http\Request;
use App\banner;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session; 

class FrontendController extends Controller
{
   
    public function index()
    {

       $category = Category::where(['parent_id'=> 0 ])->get(); 
       $category_menu ="";
       foreach ($category as $value){
       	     $category_menu .= "<div class='panel-heading'>
									<h4 class='panel-title'>
										<a data-toggle='collapse' data-parent='#accordian' href='#".$value->id."'>
											<span class='badge pull-right'><i class='fa fa-plus'></i></span>
											".strtoupper($value->name)."
										</a>
									</h4>
								</div>
								<div id='".$value->id."' class='panel-collapse collapse'>
									<div class='panel-body'>
										<ul>";
				     $subcat = Category::where(['parent_id'=>$value->id])->get();
								foreach ($subcat as $sub) {
									 $category_menu .="<li><a href='#'>".strtoupper($sub->name)."</a></li>";
								}			
					 $category_menu .= "</ul>
									</div>
								</div>";
                      }
            $banners = Banner::get();
       return view('pages.frontend.index',compact('category','category_menu','banners'));
    }
    
    public function userstore(Request $request){

        // dd($request->all());	
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        if(Auth::attempt(['email'=>$input['email'],'password'=>$input['password']])){
                dd("here");
              Session::put('frontSession',$input['email']);
              return redirect()->route('shopping.login')
                         ->with('success',' successfully');
                // return view('pages.frontend.index');
            }

    }

    public function userverify(Request $request){
    	// dd($request->all());
    	// dd(Auth::user()->role);
    	if($request->isMethod('post')){
    		$data = $request->all();
    		if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]) && Auth::user()->role == "Customer"){
                  Session::put('frontSession',$data['email']);
                  // dd();  
    			return redirect()->route('shopping.home');
    		}else{
                 // if(Auth::user()->role == "Customer")
                 // {
                 //   return redirect()->back()->with('error','Invalid Username or Password.');
                 // }else{    
    			  return redirect()->back()->with('error','Invalid User.');
                 // } 
    		}
    	}
    }
    public function product()
    {
        return view('pages.frontend.shop');
    }

    public function login(){
    	return view('pages.frontend.login');
    }

}
