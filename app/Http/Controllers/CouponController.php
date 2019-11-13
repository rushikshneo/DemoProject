<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coupon;
use Illuminate\Support\Facades\Validator;
use Auth;

class CouponController extends Controller
{
  
    public function index()
    {
          $coupon = coupon::get();
          return view('pages.CouponManagement.index',compact('coupon'));
    }

   
    public function create()
    {
         return view('pages.CouponManagement.create');
    }

  
    public function store(Request $request)
    {
          $validator = Validator::make($request->all(),[
            'coupon'            => 'required',
            'noper'             => 'required',
            'notimecode'        => 'required',
         ],
         [
          'coupon.required'    =>'This field is required .',
          'noper.required'     =>'This field is required .',
          'notimecode.required'=>'This field is required .',        
         ]
       );

        if ($validator->fails()) {
                  return redirect('coupon/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->isMethod('post')){
            $data = $request->all();
            $coupon = new coupon;
            $coupon->coupon_code = $data['coupon'];    
            $coupon->percent_off = $data['noper'];    
            $coupon->no_of_uses  = $data['notimecode'];
            $coupon->created_by  = Auth::user()->id;
            $coupon->save();    
            return redirect()->route('coupon.index')->with('flash_message_success', 'Coupon has been added successfully');
        }
     }

    public function show($id)
    {

    }

    public function edit($id)
    {
         $coupon = coupon::find($id);
         return view('pages.CouponManagement.edit',compact('coupon'));
    }

    public function update(Request $request, $id)
    {
       if($request->isMethod('PATCH')){
        $data      = $request->all();
        $coupon_id = coupon::find($id);
        coupon::where(['id'=>$id])->update(['coupon_code'=>$data['coupon'],'percent_off'=>$data['noper'],'no_of_uses'=>$data['notimecode'],'modified_by'=>Auth::user()->id]);
        return redirect()->route('coupon.index')->with('flash_message_success', 'Coupon has been Updated Successfully');
      }
    }

    public function destroy($id)
    {
        coupon::find($id)->delete();
        return view('pages.CouponManagement.index');
    }
}
