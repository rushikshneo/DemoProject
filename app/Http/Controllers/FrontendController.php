<?php

namespace App\Http\Controllers;
use App\productattribute;
use App\Category;
use App\Product;
use App\order;
use Illuminate\Http\Request;
use App\banner;
use App\User;
use App\user_addresses;
use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session; 
use Socialite;
use Illuminate\Support\Facades\URL;
use App\ProductsAttribute;
use Currency;

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
            $banners    = Banner::get();
            $products   = Product::with('images')->where('status','=','0')->with('category')->get();
            $collection = collect( $products);
            $chunks     = $collection->chunk(3);
            $chunks2    = $collection->chunk(4);
            $result     = $chunks->toArray(); 
       return view('pages.frontend.index',compact('category','category_menu','banners',
           'products','chunks','chunks2','subcat'));
     }


// public function redirectToProvider($provider)
//    {
//        return Socialite::driver($provider)->redirect();
//    }


//    public function handleProviderCallback($provider)
//    {
//        try {
//            $user = Socialite::driver($provider)->user();
//        } catch (Exception $e) {
//            return redirect()->route('shopping.home');
//        }

//        $authUser = $this->findOrCreateUser($user, $provider);
//        Auth::login($authUser, true);
//        return redirect($this->redirectTo);
//    }


//    public function findOrCreateUser($providerUser, $provider)
//    {
//        $account = SocialIdentity::whereProviderName($provider)
//                   ->whereProviderId($providerUser->getId())
//                   ->first();
//        if ($account) {
//            return $account->user;
//        } else {
//            $user = User::whereEmail($providerUser->getEmail())->first();
//               // dd($user);
//            if (! $user) {
//                $user = User::create([
//                    'email'      => $providerUser->getEmail(),
//                    'firstname'  => $providerUser->getName(),
//                    'lastname'   => $providerUser->getName(),

//                ]);
//            }

//            $user->identities()->create([
//                'provider_id'   => $providerUser->getId(),
//                'provider_name' => $provider,
//            ]);

//            return $user;
//        }
//    }






    public function account(){
        $id          = Auth::User()->id;
       $userinfo     = User::where('id',$id)->with('user_addresses')->get();
          $order    = order::where('user_id','=',Auth::user()->id)
                      ->select('product_id')
                      ->get();
                      $order_ids =[];
                      foreach ($order as $ord) {
                         array_push($order_ids, $ord->product_id);
                      }
        return view('pages.frontend.account',compact('userinfo','order_ids'));
    }
   
    public function update_def_address(Request $request){
       $id = $request->id;
       user_addresses::where('user_id', Auth::User()->id)->
                               where('defaultaddress',1)->
                               update(['defaultaddress'=>'0']);
       $user = user_addresses::where('id','=',$id)
               ->update(['defaultaddress'=>'1']);

       $getcurrent_url= URL::previous();
       $get_page=explode('/', $getcurrent_url)[4]; 
       if($get_page=="checkout"){
           // return  redirect()->back();
       }else{ 
         return response()->json(['success' => 'success'], 200);
       }
    }


    public function useraddress($id){
        return view('pages.frontend.address',compact('id'));
    } 

   

    public function updateaddress(Request $request,$id){
       // dd($request->all());
      $data = $request->all();
      $user_add = user_addresses::where('id','=',$id)->update(['address1'=>$data['address1'],'address2'=>$data['address2'],'zip'=>$data['zip'],'city'=>$data['city'],'state'=>$data['state'],'country'=>$data['country'],'user_id'=> Auth::user()->id]);
      $getcurrent_url= URL::previous();
      $get_page=explode('/', $getcurrent_url)[4];
      if($get_page=="checkout"){
      return redirect()->route('shopping.checkout')
                       ->with('success','Address updated successfully.');
      }else{ 
      return redirect()->route('shopping.account')
                       ->with('success','Address updated successfully.');
      }
    }

  public function deleteadd($id){
         $id = user_addresses::find($id);
       if($id->defaultaddress == 0){
           $id->delete();
           return redirect()->route('shopping.account')
                  ->with('success','Address deleted successfully.');
       }else{
              $id->delete();
              $latest = user_addresses::latest()->first();
              $user   = user_addresses::where('id','=',$latest->id)
                        ->update(['defaultaddress'=>1]);
                return redirect()->route('shopping.account')
                       ->with('success','Address deleted successfully the default address should be changed.');
       }

    }

    public function storeuseradd(Request $request,$id){
        if($request->isMethod('post'))
        {
            $data             = new user_addresses;
            $data['address1'] = $request->address1;
            $data['address2'] = $request->address2;
            $data['zip']      = $request->zip;
            $data['city']     = $request->city;
            $data['state']    = $request->state;
            $data['country']  = $request->country;
            $data['user_id']  = $id;
            $data->save();
            return redirect()->route('shopping.account')
                           ->with('success','Address added successfully.');
        }
    }

    public function edituseradd($id){
       $user_add = user_addresses::where('id','=',$id)->get();
       // dd($user_add);
       return view('pages.frontend.editaddress',compact('user_add'));    
    }
    
    
    public function userorders($id){
           $order    = order::where('user_id','=',$id)
                        ->join('products','products.id','orders.id')
                        ->select('products.name','orders.id','orders.status')
                        ->get();
             // dd($order);
       return view('pages.frontend.order',compact('order'));
    }

    public function userstore(Request $request){
        // dd($request->all());	
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        if(Auth::attempt(['email'=>$input['email'],'password'=>$input['password']])){
              Session::put('frontSession', $input['email']);
              return redirect()->route('shopping.login')
                ->with('success','registration successfully done ! login now.');
          }
    }

    public function paypal(){
               $order_id=[];
      $userinfo = User::where('id','=',Auth::user()->id)
                           ->with('user_addresses')->get();  
      $product = \Cart::session(Auth::user()->id)->getContent();
      $total   = \Cart::session(Auth::user()->id)->getTotal();
              // dd(count($product));
          foreach ($product as $product_id) {
               $order = new order;
               $order['payment_method'] = "paypal";
               $order['status']         = "0";
               $order['total']          = $total;
               $order['product_id']     = $product_id->id;
               $order['user_id']        = Auth::user()->id;
      foreach ($userinfo as $user_info) 
      {   foreach ($user_info->user_addresses as $billing_add ) {
           if($billing_add->defaultaddress == 1){
               $order['billing_address1'] = $billing_add->address1;
               $order['billing_address2'] = $billing_add->address2;
               $order['billing_city']     = $billing_add->city;
               $order['billing_state']    = $billing_add->state;
               $order['billing_country']  = $billing_add->country;
               $order['billing_zip']      = $billing_add->zip;
               $order->save();   
               array_push($order_id, $order->id);
           }  
         }
      }                
   }           
               // dd();
               Session::put('total' ,$total);   
               Session::put('id'    ,$order_id);   
      return view('pages.frontend.paypal',compact('userinfo'));
    }

    public function cod(){
      $userinfo = User::where('id','=',Auth::user()->id)
                      ->with('user_addresses')->get();  
      $product = \Cart::session(Auth::user()->id)->getContent();
      $total   = \Cart::session(Auth::user()->id)->getTotal();
              
             foreach ($product as $product_id) {
               $order = new order;
               $order['payment_method']="cod";
               $order['status']="0";
               $order['total']= $total;
               $order['product_id']=$product_id->id;
               $order['user_id']        = Auth::user()->id;
      foreach ($userinfo as $user_info) 
      {   foreach ($user_info->user_addresses as $billing_add ) {
           if($billing_add->defaultaddress == 1){
               $order['billing_address1'] = $billing_add->address1;
               $order['billing_address2'] = $billing_add->address2;
               $order['billing_city']     = $billing_add->city;
               $order['billing_state']    = $billing_add->state;
               $order['billing_country']  = $billing_add->country;
               $order['billing_zip']      = $billing_add->zip;
               $order->save(); 
           }  
         }
      }   
       }  
           $item = \Cart::session(Auth::user()->id)->getContent(); 
            // dd($item);
            foreach ($item as $key => $value) {
             \Cart::session(Auth::user()->id)->remove($key);
            }   
               $message="success";
               return view('pages.frontend.status',compact('message'));  
               // Session::put('total',$total);      
      // return view('pages.frontend.paypal',compact('userinfo'));
    }

    public function addtocart(Request $request,$Product_id){     
       $product_details = Product::where('id','=',$Product_id)->with('images')->get();
       foreach ($product_details as $product_details) {
           foreach ($product_details->images as $value) {
          $item = \Cart::session(Auth::user()->id)->add(['id' => $product_details->id, 'name' => $product_details->name, 'quantity' =>1 , 'price' => $product_details->price, 'image_url' => $value->image_url, 'options' => ['size' => 'large']]);
          return redirect()->route('shopping.cart')->with('success','item added successfully.');
           }
        }
    }

    public function cart(){
     $item      = \Cart::session(Auth::user()->id)->getContent();
     $sub_total = \Cart::session(Auth::user()->id)->getSubTotal();
     $total     = \Cart::session(Auth::user()->id)->getTotal();

     if(count($item)==0){
       return view('pages.frontend.cart',compact('item','sub_total','total'))->with('error','There is no product in Cart .');
     }else{ 
       return view('pages.frontend.cart',compact('item','sub_total','total'));
     }
    }
    
    public function removefromcart($id){
      \Cart::session(Auth::user()->id)->remove($id);
      return redirect()->route('shopping.cart')
                        ->with('success','Product remove from cart successfully');
    }

    public function userlogout(){
        Auth::logout();
        Session::forget('frontSession');
        return redirect()->route('shopping.home');
    }

    public function userverify(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
            $user = User::Where('email',$request->email)
                         ->Where('status','0')
                         ->first();
                if($user->is_admin()==false)
                { 
                  Session::put('frontSession',$data['email']);
                  return redirect()->route('shopping.home');
                }
    		}else{
    			  return redirect()->back()->with('error','Invalid User.');
                 // if(Auth::user()->role == "Customer")
                 // {
                 //   return redirect()->back()->with('error','Invalid Username or Password.');
                 // }else{    
                 // } 
    		}
    	}
    }

    public function forgot(){
      // dd("here");
      return view('pages.frontend.forgot');
    }

    public function product($id)
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
        $products        = Product::with('images')->with('category')->get();
        $collection      = collect( $products);
        $chunks          = $collection->chunk(3);
        $product_details = Product::where('id','=', $id)->with('images')->get();

        return view('pages.frontend.product',compact('category_menu','chunks','product_details'));
    }

    public function checkout_product(){
      $item        = \Cart::session(Auth::user()->id)->getContent();
      $sub_total   = \Cart::session(Auth::user()->id)->getSubTotal();
      $total       = \Cart::session(Auth::user()->id)->getTotal();
      $userinfo    = User::where('id','=',Auth::user()->id)->with('user_addresses')->get();
     // $getcurrent_url= URL::current();
     // $get_page=explode('/', $getcurrent_url)[4]; 
        // dd("here");
     return view('pages.frontend.checkout',compact('item','sub_total','total','userinfo'));
     }

    public function login(){
      	return view('pages.frontend.login');
    }

}
