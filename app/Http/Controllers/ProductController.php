<?php


namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\productattribute;
use App\productattributevalue;
use Illuminate\Support\Facades\Validator;
use Image;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{ 

    public function index()
    {
          
        return view('pages.ProductManagement.index');
        // $products = Product::latest()->paginate(5);
        // return view('pages.ProductManagement.index',compact('products'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        $product_attri =productattribute::get();
        // $product_attri_values=productattributevalue::get();            
        return view('pages.ProductManagement.create',compact('category','product_attri','product_attri_values'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
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

        ]
    );

    if ($validator->fails()) {
      return redirect('product/create')
            ->withErrors($validator)
            ->withInput();
    }
    

   //  $banner = new banner;
   // if($request->hasFile('image')){
   //              $image_tmp = Input::file('image');
   //              if ($image_tmp->isValid()) {
   //                  $extension = $image_tmp->getClientOriginalExtension();
   //                  $fileName = $bannername.'.'.$extension;
   //               $banner_path = 'images/frontendimage/product_image/'.$fileName;
   //             Image::make($image_tmp)->resize(1140, 340)->save($banner_path);
   //                  $banner->banner_name = $fileName; 
   //              }
   //          }


   

        Product::create($request->all());


        return redirect()->route('pages.ProductManagement.index')
                        ->with('success','Product created successfully.');
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