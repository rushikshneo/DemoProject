<?php

namespace App\Http\Controllers;
use App\order;
use App\email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
class OrderController extends Controller
{
  
    public function index()
    {
             $order    = order::join('products','products.id','orders.product_id')
                        ->select('products.name','orders.id','orders.user_id','orders.product_id','orders.status','orders.payment_method','orders.billing_address1','orders.billing_address2','orders.billing_city','orders.billing_state','orders.billing_country','orders.billing_zip')->orderBy('id','DESC')->paginate(5);
                        // dd($order); 
        return view('pages.OrderManagement.index',compact('order'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
                  $order = order::where('orders.id','=',$id)
                           ->join('products','products.id','orders.product_id')
                           ->join('users','users.id','orders.user_id')
                           ->select('users.email','users.firstname','users.lastname','products.name','orders.total','orders.id','orders.user_id','orders.product_id','orders.status','orders.payment_method','orders.billing_address1','orders.billing_address2','orders.billing_city','orders.billing_state','orders.billing_country','orders.billing_zip','orders.applied_coupons','orders.order_status')->get();
              return view('pages.OrderManagement.show',compact('order'));
    }
     public function orderstatus(Request $request, $id)
    {
       $order = $request->all();
       order::where('id','=',$id)->update(['order_status'=>$order['order_status']]);
       return redirect()->route('order.show',$id)->with('success','The order status is updated.');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $payment = $request->all();
        order::where('id','=',$id)->update(['status'=>$payment['payment_status']]);
           $order = order::where('orders.id','=',$id)
                           ->join('products','products.id','orders.product_id')
                           ->join('users','users.id','orders.user_id')
                           ->select('users.email','users.firstname','users.lastname','products.name','orders.total','orders.id','orders.user_id','orders.product_id','orders.status','orders.payment_method','orders.billing_address1','orders.billing_address2','orders.billing_city','orders.billing_state','orders.billing_country','orders.billing_zip','orders.applied_coupons')->get();
                           // dd( $order);
                $email = email::where('email_name','=','order Email')->get(); 
              foreach ($order as $key => $order) {
         foreach ($email as $value) {
            $email_content=[
                              'email_header'      => $value->email_header,
                              'email_main_content'=> $value->email_main_content,
                              'email_footer'      => $value->email_footer,
                              'billing_address1'  => $order->billing_address1,
                              'billing_address2'  => $order->billing_address2,
                              'billing_city'      => $order->billing_city,
                              'billing_state'     => $order->billing_state,
                              'billing_country'   => $order->billing_country,
                              'billing_zip'       => $order->billing_zip,
                              'ordermethod'       => $order->payment_method,
                              'order_id'          => $order->id,
                              'total'             => $order->total,
                             
                            ];
                            
         } 
      }   
        Mail::send('pages.frontend.email.order_status', $email_content , function ($m) use ($order) {
            $m->from('hello@app.com', 'Shopping Chart');
             $m->to($order->email)->subject('Order Details');
            
        });
        return redirect()->route('order.show',$id)->with('success','The Payment status is updated.');
    }

    public function destroy($id)
    {
        //
    }
}
