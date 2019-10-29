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
          
        return view('pages.ProductManagement.index');
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
            'attri_select'          => 'required',
            'attri_val'             => 'required',
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
                $product['created_by']          = $request->productprice;
                $product->save();

                  $product_cat = new product_categories;
                  $product_cat->product_id = $product->id;
                  $product_cat->category_id = $request->category_id;
                  $product_cat->save();

                $product_image      = new product_image;
                $product_image_name = $request->productimagename;
                foreach ($request->file('image') as $value) {
                      if ($value->isValid()) {
                            $extension = $value->getClientOriginalExtension();
                            $fileName = $product_image_name.'.'.$extension;
                            $productimage_path = 'images/frontendimage/banners/'.$fileName;
                            Image::make($value)->resize(1140, 340)
                                ->save($productimage_path);
                             $product_image->product_id = $product->id;
                             $product_image->image_name = $fileName; 
                             $product_image->image_url  = $productimage_path;
                             $product_image->created_by = Auth::user()->id;
                             $product_image->save();
 
                        }

                } 
                  $product_asso = new  product_attributes_assoc;
                foreach ($request->attri_val as  $value) {
                  $product_asso->product_id                 = $product->id;
                  $product_asso->product_attribute_id       = $request->attri_select;
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
        return view('pages.ProductManagement.edit',compact('product'));
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