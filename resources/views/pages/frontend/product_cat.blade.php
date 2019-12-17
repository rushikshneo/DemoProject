@extends('pages.frontend.master2')
@section('content')

<section>
	 <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							 <?php echo$category_menu; ?>	 
						</div><!--/category-products-->
					
						<div class="brands_products">
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div>
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						@foreach($cat as $ca)
						<h2 class="title text-center">{{$ca->name}}</h2>
						@endforeach
						@foreach($products as $pro)
							@foreach($pro->product_cat as $pro_info)
							  @if($pro_info->status == 0)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
						                     @foreach($pro->product_image as $pro_img)
											<img src="{{URL::asset($pro_img->image_url)}}" alt="" style="height:185px; width:auto;" />
											@endforeach
											<h2>&#x20b9;{{$pro_info->price}}</h2>
											<p>{{$pro_info->name}}</p>
											@if(Auth::check())
											<a href="{{route('shopping.addtocart',$pro->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											@else
											<a href="{{route('shopping.login',$pro->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											@endif
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>&#x20b9;{{$pro_info->price}}</h2>
												 <p><a style="color: white;" href="{{route('shopping.product_details',$pro->product_id)}}">{{$pro_info->name}}</a></p>  
												<a href="{{route('shopping.addtocart',$pro->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="{{route('shopping.addwishlist',$pro->product_id)}}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<!-- <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li> -->
									</ul>
								</div>
							</div>
						</div>
						   @endif
						  @endforeach
						@endforeach

					</div><!--features_items-->
				</div>
				   </div>
			</div>
		</div>


	</section>
<script type="text/javascript">
	$(document).ready(function(){      
       $('#more_description').hide();
      $('#show').click(function(){  
       $('#more_description').show();  
        $('#show').hide();

       });


      
   });
</script>
@endsection