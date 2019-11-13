<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productattribute;
use App\productattributevalue;
use App\User;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;

class ProductAttributeController extends Controller
{

    public function index()
    {
        $productattribute = productattribute::with('attribute')->get();
        return view('pages.ProductAttribute.index',compact('productattribute'));
    }
    public function create()
    {
       return view('pages.ProductAttribute.create');
    }


    public function store(Request $request)
    {
        if($request->isMethod('post'))
        { 
           $validator = Validator::make($request->all(), [
            'name'   => 'required',
            // 'values[]' => 'required',
          ],
          [
           'name.required'   =>'This field is required .',
           // 'values[].required' =>'This field is required .',       
          ]
       );

        if ($validator->fails()) {
                  return redirect('product_attri/create')
                        ->withErrors($validator)
                        ->withInput();
                }
                $product_attri                 = new productattribute;
                $product_attri['name']         = $request->name;
                $id   = Auth::user()->id;
                $product_attri['created_by']   = $id; 
                $product_attri->save();
                $data = $request->input('values');
            foreach ($data as $value) {
                 $product_attri_value = new productattributevalue; 
                 $product_attri_value['product_attribute_id'] = $product_attri->id;
                 $product_attri_value['attribute_value'] = $value;
                 $product_attri_value['created_by']   = $id; 
                 $product_attri_value->save();
            }
          return redirect()->route('product_attri.index')
                           ->with('success','Product Attribute should be
                                 added successfully.');
         }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $productattribute = productattribute::find($id);  
        $value  = productattribute::with('attribute')->find($id);  
        return view('pages.ProductAttribute.edit',compact('productattribute','value'));    
    }

    public function update(Request $request, $id)
    {
      $input['name'] = $request->name;
      $user_id       = Auth::user()->id;
      $input['modify_by'] = $id;
      $attribute = productattribute::find($id);
      $attribute->update($input);
      $data = $request->input('values');
      $attri_value =  productattributevalue::select('id','product_attribute_id', 
                            'attribute_value')->get();
        foreach ($attri_value as $valuess) {
                foreach ($data as $value) {
                           if($id == $valuess->product_attribute_id){
                             $attribute = productattributevalue::find($valuess->product_attribute_id);
                             $product_attri_value['modified_by']      = $user_id;  
                             $product_attri_value['attribute_value']  = $value;
                             $attribute->update($product_attri_value);
                           } 
                  }
              }
         return redirect()->route('product_attri.index')
          ->with('success','Product Attribute should be
                  Updated successfully.');   
    }


    public function destroy($id)
    {
         DB::table("productattributes")->where('id',$id)->delete();
         DB::table("productattributevalues")->where('product_attribute_id',$id)
         ->delete();
          return redirect()->route('product_attri.index')
                            ->with('success','Product Attribute deleted successfully');
    }
}
