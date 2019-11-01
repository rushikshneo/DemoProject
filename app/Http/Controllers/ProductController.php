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
        $products      = product::get();
        $product_image = product_image::get();
        $products_cat  = product_categories::join('categories','product_categories.category_id','=','categories.id')->get();
        // dd($products_cat);
        return view('pages.ProductManagement.index',compact('products','product_image','products_cat'));
        // $products = Product::latest()->paginate(5);
        // return view('pages.ProductManagement.index',compact('products'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $category = Category::get();
        $product_attri =productattribute::get();
        // $product_attri_values=productattributevalue::get();            
        return view('pages.ProductManagement.create',compact('category','product_attri'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
          // dd($request->all());
       
    //   $validator = Validator::make($request->all(), 
    //       [
    //         'category_id'           => 'required',
    //         'productname'           => 'required',
    //         'productshortdesc'      => 'required',
    //         'productlongdesc'       => 'required',
    //         'productprice'          => 'required',
    //         'productspecialprice'   => 'required',
    //         'productspicalpricefrom'=> 'required',
    //         'productspecialpriceto' => 'required',
    //         'productquantity'       => 'required',
    //         'metatitle'             => 'required',
    //         'metadesc'              => 'required',
    //         'metakeyword'           => 'required',
    //         'status'                => 'required',
    //         'productimagename'      => 'required',
    //         'image'                 => 'required',
    //         'attri_select'          => 'required',
    //         'attri_val'             => 'required',
    //     ],
    //      [
    //         'category_id.required'           =>'This field is required.',
    //         'productname.required'           =>'This field is required.',
    //         'productshortdesc.required'      =>'This field is required.',
    //         'productlongdesc.required'       =>'This field is required.',
    //         'productprice.required'          =>'This field is required.',
    //         'productspecialprice.required'   =>'This field is required.',
    //         'productspicalpricefrom.required'=>'This field is required.',
    //         'productspecialpriceto.required' =>'This field is required.',
    //         'productquantity.required'       =>'This field is required.',
    //         'metatitle.required'             =>'This field is required.',
    //         'metadesc.required'              =>'This field is required.',
    //         'metakeyword.required'           =>'This field is required.',
    //         'status.required'                =>'This field is required.',
    //         'productimagename.required'      =>'This field is required.',
    //         'image.required'                 =>'This field is required.',
    //         'attri_select.required'          =>'This field is required.',
    //         'attri_val.required'             =>'This field is required.',

    //     ]
    // );
                // if ($validator->fails()) {
                //   return redirect('product/create')
                //         ->withErrors($validator)
                //         ->withInput();
                // }

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
                $product['created_by']          = $request->productprice;
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
                      $new_name   = $request->productimagename.".".$imageexten;
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
               $arr_attri_val=array_combine($request->attri_select,$request->attri_val);
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


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('pages.ProductManagement.show',compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    { 
        $product_attri      = productattribute::get();
        $product_att_value  = productattributevalue::get();
        $category           = Category::get();
        $attribute_val      = productattribute::with('attribute')->get();
        $product_attri_asso = product_attributes_assoc::find($product->id)->all();
        $product_image      = product_image::find($product->id);
        $image_name         = explode('.', $product_image->image_name)[0];  
        $products_cat       = product_categories::join('categories','product_categories.category_id','=','categories.id')->find($product->id);
// dd($attribute_val);
        return view('pages.ProductManagement.edit',compact('product','category',
                                        'product_attri','attribute_val','product_att_value','product_attri_asso','product_image','products_cat','image_name'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);


        $product->update($request->all());


        return redirect()->route('pages.ProductManagement.index')
                        ->with('success','Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();


        return redirect()->route('pages.ProductManagement.index')
                        ->with('success','Product deleted successfully');
    }
}