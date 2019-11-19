<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Category;
use App\productattribute;
use App\productattributevalue;
use App\product_attributes_assoc;
use App\product_categories;
use App\product_image;
use Auth;

class ProductController extends Controller
{ 

    public function index()
    {

        $products      = product::with('images')->latest()->paginate(5);
        $products_cat  = product_categories::join('categories','product_categories.category_id','=','categories.id')->get();
        return view('pages.ProductManagement.index',compact('products','products_cat'));
    }

    public function create()
    {
        $category = Category::get();
        $product_attri =productattribute::get();
        $category = Category::where(['parent_id'=> 0 ])->get();
        $category_menu ="";
       foreach ($category as $value) {
  $category_menu .= " <option value='".$value->id."'>".$value->name."</option>";
        $subcat = Category::where(['parent_id'=>$value->id])->get();
          foreach ($subcat as $sub) {
        $category_menu .= " <option value='".$sub->id."'>->".$sub->name ."</option>";
       }   
  }
        // $product_attri_values=productattributevalue::get();            
        return view('pages.ProductManagement.create',compact('category','product_attri','category_menu'));
    }


 
    public function store(Request $request)
    { 
           // dd($request->all());
       
      $validator = Validator::make($request->all(), 
          [
            'category_id'           => 'required',
            'productname'           => 'required',
            'productshortdesc'      => 'required',
            'productlongdesc'       => 'required',
            'productprice'          => 'required',
            'productspecialprice'   => 'required',
            'productspicalpricefrom'=> 'required',
            'productspecialpriceto' => 'required',
            'productquantity'       => 'required',
            'metatitle'             => 'required',
            'metadesc'              => 'required',
            'metakeyword'           => 'required',
            'status'                => 'required',
            'productimagename'      => 'required',
            'image'                 => 'required',
            'attri_select.*'        => 'required',
            'attri_val.*'           => 'required',
        ],
         [
            'category_id.required'           =>'This field is required.',
            'productname.required'           =>'This field is required.',
            'productshortdesc.required'      =>'This field is required.',
            'productlongdesc.required'       =>'This field is required.',
            'productprice.required'          =>'This field is required.',
            'productspecialprice.required'   =>'This field is required.',
            'productspicalpricefrom.required'=>'This field is required.',
            'productspecialpriceto.required' =>'This field is required.',
            'productquantity.required'       =>'This field is required.',
            'metatitle.required'             =>'This field is required.',
            'metadesc.required'              =>'This field is required.',
            'metakeyword.required'           =>'This field is required.',
            'status.required'                =>'This field is required.',
            'productimagename.required'      =>'This field is required.',
            'image.required'                 =>'This field is required.',
            'attri_select.required'          =>'This field is required.',
            'attri_val.required'             =>'This field is required.',

        ]
    );
                if ($validator->fails()) {
                  return redirect('product/create')
                        ->withErrors($validator)
                        ->withInput();
                }

                $product = new Product ;     
                $product['name']                = $request->productname;
                $product['short_description']   = $request->productshortdesc;
                $product['long_description']    = $request->productlongdesc;
                $product['price']               = $request->productprice;
                $product['special_price']       = $request->productspecialprice;
                $product['special_price_from']  = $request->productspicalpricefrom;
                $product['special_price_to']    = $request->productspecialpriceto;
                $product['status']              = $request->status;
                $product['quanity']             = $request->productquantity;
                $product['meta_title']          = $request->metatitle;
                $product['meta_description']    = $request->metadesc;
                $product['meta_keywords']       = $request->metakeyword;
                $product['created_by']          = Auth::user()->id;
                $product->save();

                $product_cat = new product_categories;
                $product_cat->product_id = $product->id;
                $product_cat->category_id = $request->category_id;
                  $product_cat->save();

                if($request->hasfile('image')){
                    $file = $request->file('image');
                    $file_count= count($file);
                    for ($i=0; $i < $file_count; $i++) { 
                      $imagesize  = $file[$i]->getClientSize();
                      $imageexten = $file[$i]->getClientOriginalExtension();
                      if($file_count != 1)
                      {  
                        $new_name   = $request->productimagename.$i.".".$imageexten;
                      }else{
                        $new_name   = $request->productimagename.".".$imageexten;
                      }
                      $destnation_path ='images/frontendimage/product_image/'.$new_name;
                      Image::make($file[$i])->save($destnation_path);
                      $product_image = new product_image;
                      $product_image->product_id = $product->id;
                      $product_image->image_name = $new_name; 
                      $product_image->image_url  = $destnation_path;
                      $product_image->created_by = Auth::user()->id;
                      $product_image->save();
                    }
                }

            $attributes = productattribute::join('productattributevalues','productattributes.id','=','productattributevalues.product_attribute_id')
               ->get();          
               $arr_attri_val=array_combine($request->attri_select , $request->attri_val);
               foreach ($arr_attri_val as $key => $value) {
               // dd($key);
                    $product_asso = new  product_attributes_assoc;
                    $product_asso->product_id  = $product->id;
                    $product_asso->product_attribute_id = $key;
                    $product_asso->product_attribute_value_id = $value; 
                    $product_asso->save();
               }
        
        return redirect()->route('product.index')
                        ->with('success','Product created successfully.');
    }


   public function function_delete(Request $request){
        $id     = $request->id;
        $value  = productattributevalue::select('product_attribute_id','attribute_value','id')->where('productattributevalues.product_attribute_id',$id)->get(); 
        // dd($value); 
        return response()->json($value);
   }

    public function show(Product $product)
    {
        return view('pages.ProductManagement.show',compact('product'));
    }

    public function edit(Product $product)
    { 
        // dd($product->images);
        $product_attri      = productattribute::get();
        $product_att_value  = productattributevalue::get();
        $category           = Category::get();
        $attribute_val      = productattribute::with('attribute')->get();
        $product_attri_asso = product_attributes_assoc::get();
        // $product_image      = product_image::find($product->id)->all();
        $product_image_count =count($product->images);
        $image_name=[];
         for ($i = 0; $i < $product_image_count; $i++) { 
            foreach ($product->images as $value) {
           $image_data       = array_push($image_name, explode('.',$value->image_name)[0]);  
           }
           }  
        $products_cat       = product_categories::join('categories','product_categories.category_id','=','categories.id')->find($product->id);
        // dd( $products_cat);
        return view('pages.ProductManagement.edit',compact('product','category',
                                        'product_attri','attribute_val','product_att_value','product_attri_asso','products_cat','image_name'));
    }

    public function update(Request $request, Product $product)
    {
      // dd($request->all());    
        //-----------------Product Attributes-----------//
        $product_S = Product::find($product->id);
        $products['name']                     = $request->productname;
        $products['short_description']        = $request->productshortdesc ; 
        $products['long_description']         = $request->productlongdesc;
        $products['price']                    = $request->productprice;
        $products['special_price']            = $request->productspecialprice;
        $products['special_price_from']       = $request->productspicalpricefrom;
        $products['special_price_to']         = $request->productspecialpriceto;
        $products['quanity']                  = $request->productquantity;
        $products['meta_title']               = $request->metatitle;
        $products['meta_description']         = $request->metadesc;
        $products['meta_keywords']            = $request->metakeyword;
        $products['status']                   = $request->status;
        $products['modify_by']                = Auth::user()->id;        
        $product_S->update($products);
         // $procat_id= products_categories::where('product_id','=',$product->id);
         // dd($procat_id );

        //-----------------Product Category -------------//
        $prodct_categories         = product_categories::find($product->id);
        $product_cat['category_id'] = $request->category_id;
        $prodct_categories->update($product_cat);
         // dd();
         //----------------Product image-----------------//
     //     if(empty($request->file('image'))){
     //        foreach ($product->images as $key => $value){ 
     //                $product_image_count = count($request->productimagename);
     //                 for ($i=0; $i < $product_image_count; $i++) { 
     //                    $new_name           = $request->productimagename[$i];
     //                    $product_image_path = $value->image_url;   
     //                  }           
     //                }  
     //        product_image::find($value->id)->where('product_id','=',$product->id)->update(['image_name'=> $new_name,'image_url'=>$product_image_path,'modified_by'=>Auth::user()->id]);   
     //         }else{
     //    if($request->hasfile('image')){
     //        $file = $request->file('image');
     //        $file_count= count($file);
     //        // dd(count($product->images));   
     //          for ($i=0; $i < $file_count; $i++){ 
     //           $imagesize  = $file[$i]->getClientSize();
     //           $imageexten = $file[$i]->getClientOriginalExtension();
     //           $product_image_count = count($request->productimagename);
     //            for ($i=0; $i < $product_image_count; $i++) { 
     //              if($file_count != 1)
     //               { 
     //                $new_name = explode('.',$request->productimagename[$i])[0].$i.".".
     //                            $imageexten;
     //               }else{
     //                 $new_name = explode('.',$request->productimagename[$i])[0].".".
     //                             $imageexten;
     //               }

     //            // foreach ($ as $key => $value) {

     //            // }
     //          Image::make($file[$i])->save($product_image_path);    
     //          $product_image_path ='images/frontendimage/product_image/'.$new_name;
     //                // dd($new_name);
     //            }
     //             // foreach ($product->images as $key => $value) {
     //             //   product_image::find($value->id)->where('product_id','=',$product->id)->update(['image_name'=> $new_name]);
           
     //             //   } 

     //        } 
     //     }
     // }
     //                  $attri_sel = count($request->attri_select);
     //                  $attri_val = count($request->attri_val);
     //                  if($attri_sel == $attri_val)
     //                  {
     //                    for ($i=0; $i< $attri_sel; $i++) { 
     //                    $prod_select = $request->attri_select[$i];
     //                    $prod_val    = $request->attri_val[$i];
     //                        // dd($product->productasso);
     //                    }
     //                        foreach ($product->productasso as $asso) {
     //                            // dd($prod_select ,$prod_val);
     //                      $id=product_attributes_assoc::find($asso->id)->update(['product_attribute_id'=> $prod_select,'product_attribute_value_id'=>$prod_val]);
     //                      // dd($id);
     //                      //
     //                            // dd($asso->id);
     //                        }
     //                    // print_r()($product_asso);
     //                  }
               
             
        return redirect()->route('product.index')
                        ->with('success','Product updated successfully');
    }


    public function destroy(Product $product)
    {
          product::find($product->id)->delete();
        // dd($product->productasso);
        foreach ($product->productasso as $product_asso ) {
         product_attributes_assoc::find($product_asso->id)->delete();
           }
         product_categories::where('product_id','=',$product->id)->delete();
         foreach ($product->images as $images) {
           product_image::find($images->id)->delete();
          } 
        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }
}