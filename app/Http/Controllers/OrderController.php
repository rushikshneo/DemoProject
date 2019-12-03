<?php

namespace App\Http\Controllers;
use App\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             $order    = order::join('products','products.id','orders.id')
                        ->select('products.name','orders.id','orders.user_id','orders.product_id','orders.status','orders.payment_method','orders.billing_address1','orders.billing_address2','orders.billing_city','orders.billing_state','orders.billing_country','orders.billing_zip')->orderBy('id','DESC')->paginate(5);
                        
        return view('pages.OrderManagement.index',compact('order'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $order = order::where('orders.id','=',$id)
                           ->join('products','products.id','orders.id')
                           ->join('users','users.id','orders.user_id')
                           ->select('users.email','users.firstname','users.lastname','products.name','orders.total','orders.id','orders.user_id','orders.product_id','orders.status','orders.payment_method','orders.billing_address1','orders.billing_address2','orders.billing_city','orders.billing_state','orders.billing_country','orders.billing_zip','orders.applied_coupons')->get();
                           // dd($order);
        return view('pages.OrderManagement.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payment = $request->all();
        order::where('id','=',$id)->update(['status'=>$payment['payment_status']]);
        return redirect()->route('order.show',$id)->with('success','The Payment status is updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
