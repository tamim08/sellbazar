@extends('front-end.master')
@section('top-script')
<script type="text/javascript" src="{{asset('/')}}front-end/js/easing.js"></script>
	<script src="{{asset('/')}}front-end/js/easyResponsiveTabs.js" type="text/javascript"></script>
	<link href="{{asset('/')}}front-end/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
	<link rel="stylesheet" href="{{asset('/')}}front-end/css/global.css">
	<script src="{{asset('/')}}front-end/js/slides.min.jquery.js"></script>
	<script>
			$(function(){
				$('#products').slides({
					preload: true,
					preloadImage: 'img/loading.gif',
					effect: 'slide, fade',
					crossfade: true,
					slideSpeed: 350,
					fadeSpeed: 500,
					generateNextPrev: true,
					generatePagination: false
				});
			});
	</script>
@endsection
@section('body')
    <!-- breadcrumb  --->
<div id="breadcrumb">
	<div class="container">
		<div class="col-md-1 category-dropdown ">
			<button class="btn btn-category btn-lg dropdown-toggle" data-toggle="dropdown" type="button">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</button>
			<ul class="dropdown-menu">
				<div class="list-group categories-list megamenu">
					<ul class='megamenu-5'>
						
					@foreach ($parentCategories as $parentCategory)
						<li><a href="{{URL::to('/type/')."/".$parentCategory->name}}" class="list-group-item megamenu-caret">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>{{$parentCategory->name}}</a>
						<ul>
						   @foreach ($parentCategory->categories as $category)
								<li><a href="{{URL::to('/category')."/".$category->name}}">{{$category->name}}</a>
								<ul>
									@foreach ($category->subCategories as $subCategory)
										<li><a href="{{URL::to('/subcategory')."/".$subCategory->name}}">{{$subCategory->name}}</a></li>
									@endforeach
									
								</ul>
							</li>
						   @endforeach
							
						</ul>
					</li>
					@endforeach
	
					</ul>
				</div>
			</ul>




		</div>

		<div class="col-md-11">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li><a href="#">Library</a></li>
			  <li class="active">Data</li>
			</ol>
		</div>  <!-- end breadcrumb --->
	</div>
</div>  <!-- end breadcrumb area  --->

<main>

<div id="product-details">
<div class="container">
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-6">
				<div id="products">
					<div class="slides_container">
						@foreach ($product->productImages as $image)
							<a href="#" target="_blank"><img src="{{asset('/')}}images/{{$image->src}}" alt=" " width="100%";/></a>
						@endforeach
						
					</div>
					<ul class="pagination">
					@foreach ($product->productImages as $image)
						<li><a href="#"><img src="{{asset('/')}}images/{{$image->src}}" alt=" " /></a></li>
					@endforeach
					</ul>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 text-center">
							<img src="{{asset('/')}}front-end/images/advertise/gp.gif" alt="" width="100%" />
						</div>

					</div>
				</div>
			</div>   <!-- end product view  -->

			<div class="col-md-6">
				<h3>{{$product->name}}</h3>
				<p>{!! $product->short_description !!}</p>
				<h4>Price : <span>${{$product->price}}</span></h4>
				<h4>deal code : {{$product->code}}</h4>
				<hr>
				<h4>Available Options :</h4>

				<form class="form-inline">
					<div class="row">
						<div class="col-xs-6">
						  <div class="form-group">
							<label for="color">Color :</label>
							<select class="form-control" id="color" width="60px">
							 @foreach ($product->colorProducts as $color)
								 <option>{{$color->color->name}}</option>
							 @endforeach
							</select>
						  </div>
						 </div>

						 <div class="col-xs-6">
						  <div class="form-group">
							<label for="size">Size :</label>
							<select class="form-control" id="size">
							@foreach ($product->sizeProducts as $size)
								 <option>{{$size->size->name}}</option>
							 @endforeach
							</select>
						  </div>
						 </div>
						 <div class="col-xs-12">
						   <div class="form-group">
							<label for="quantity">Quantity :</label>
							<select class="form-control" id="quantity">
							  <option>1</option>
							  <option>2</option>
							  <option>3</option>
							  <option>4</option>
							  <option>5</option>
							</select>
						  </div>
						 </div>
						 <div class="col-xs-12 ">
						  <button type="submit" class="btn btn-my btn-lg">Add to Cart</button>
						  <button type="submit" class="btn btn-my btn-lg">Call</button>
						  <button type="submit" class="btn btn-my btn-lg">SMS</button>
						 </div>
					</div>
				</form>
				<div class="clearfix"></div>

				<h4>Share Product :</h4>
				<div class="social-media-group">
					<a herf="#" class="facebook"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
					<a herf="#" class="twitter"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
					<a herf="#" class="linkedin"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
					<a herf="#" class="youtube"><i class="fa fa-youtube-square fa-3x" aria-hidden="true"></i></a>
				</div>
				<hr>
				<div class="row wish-compare">
					<div class="col-xs-6">
						<a herf="#" ><i class="fa fa-heart-o " aria-hidden="true"></i>Add to Wishlist</a>
					</div>
					<div class="col-xs-6">
						<a herf="#" ><i class="fa fa-signal " aria-hidden="true"></i>Add to Compare</a>
					</div>
				</div>

			</div>
		<div class="container-fluied">
			<div class="col-md-4">
				<h4>Available payments</h4>
				<div class="payments text-center">
					<img src="{{asset('/')}}front-end/images/payment/bkash.png" alt="" width="28.33%"/>
					<img src="{{asset('/')}}front-end/images/payment/cash.png" alt="" width="28.33%" />
					<img src="{{asset('/')}}front-end/images/payment/U-Cash-icon.png" alt="" width="28.33%" />
				</div>
			</div>
			<div class="col-md-8">
				<h4>Returns Policy</h4>
				<div class="return-policy">
				<p>Returns accepted within 3 days, only for damaged or wrong products.
				Return offered in the form of Cash refund or Product exchange. Buyer is
				the responsible for the shipping fees.
				</p>
				</div>
			</div>
		</div>


		<div class="col-md-12 product-tabs margin-top-bottom">
			<ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">PRODUCT DETAILS</a></li>
                    <li><a data-toggle="tab" href="#menu1">FRODUCT TAGS</a></li>
					<li><a data-toggle="tab" href="#menu2">PRODUCT REVIEWS</a></li>
                </ul>
                <div class="tab-content">
					<div id="home" class="tab-pane fade in active">
                       <p>{!! $product->description !!}</p>
                    </div>  <!-- End home tab content  -->

                    <div id="menu1" class="tab-pane fade">
                       <p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed justo massa,
						venenatis sit amet lorem sit amet, dignissim laoreet tortor.
						Nunc iaculis ligula non dolor vulputate, a vulputate diam viverra.
						Etiam egestas gravida lorem at varius. Suspendisse et tortor quis massa
						rutrum eleifend non nec dui. Praesent luctus convallis urna. Phasellus non
						tempor odio, sed faucibus arcu. Duis id convallis odio. Proin sit amet enim
						scelerisque, convallis metus mollis, varius turpis.
						</p>
						<form class="form-horizontal">
							<div class="form-group">
								<label for="tag-text" class="col-xs-1 control-label">
									<i class="fa fa-tag fa-2x " aria-hidden="true"></i>
								</label>
								<div class="col-xs-10">
								  <input type="text" class="form-control" id="tag-text" placeholder="Enter your Tags">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-offset-1 col-xs-10">
								  <button type="submit" class="btn btn-my">Submit</button>
								</div>
							</div>
						</form>
                    </div>  <!-- End fashion tab content  -->
                    <div id="menu2" class="tab-pane fade">
                       <h4>Lorem ipsum Review by</h4>
					   <p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed justo massa,
						venenatis sit amet lorem sit amet, dignissim laoreet tortor.
						Nunc iaculis ligula non dolor vulputate, a vulputate diam viverra.
						Etiam egestas gravida lorem at varius. Suspendisse et tortor quis massa
						rutrum eleifend non nec dui. Praesent luctus convallis urna. Phasellus non
						tempor odio, sed faucibus arcu. Duis id convallis odio. Proin sit amet enim
						scelerisque, convallis metus mollis, varius turpis.
						</p>
						<form>
						  <div class="form-group">
							<label for="InputEmail1">Nickname</label>
							<input type="text" class="form-control" id="InputNickname" placeholder="Nick Name">
						  </div>
						  <div class="form-group">
							<label for="InputEmail1">Email address</label>
							<input type="email" class="form-control" id="InputEmail1" placeholder="Email">
						  </div>
						  <div class="form-group">
							<label for="InputSummary">Summary of Your Review</label>
							<input type="text" class="form-control" id="InputSummary" placeholder="Summary of Your Review">
						  </div>
						  <div class="form-group">
							<label for="InputReview">Review</label>
							<textarea class="form-control" rows="3" id="InputReview"></textarea>
						  </div>
						  <button type="submit" class="btn btn-my">Submit Review</button>
						</form>
                    </div>   <!-- End  tab content  -->
                </div>  <!--- end Tab-content  ------>

			</div>


		<div class="col-md-12">
			<div class="top-heading">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<h3>Related Products</h3>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 see-all text-right">
						<p><a href="#">See all Products <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="product-slide">
				<!-- single product  --->
				<div class="product-item">
					<div class="thumbnail">
                        <div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
						<h4>Lorem Ipsum is simply </h4>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$679.87</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.html">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div> <!-- end single product  --->

				<!-- single product  --->
				<div class="product-item">
					<div class="thumbnail">
                        <div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
						<h4>Lorem Ipsum is simply </h4>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$679.87</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.html">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div> <!-- end single product  --->

				<!-- single product  --->
				<div class="product-item">
					<div class="thumbnail">
                        <div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
						<h4>Lorem Ipsum is simply </h4>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$679.87</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.html">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div> <!-- end single product  --->

				<!-- single product  --->
				<div class="product-item">
					<div class="thumbnail">
                        <div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
						<h4>Lorem Ipsum is simply </h4>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$679.87</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.html">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div> <!-- end single product  --->
			</div>
		</div>
		<!-- end thum-product section  --->
		</div>
	</div>

	<!--- Right Aside  -->
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Seller information</h4>
			</div>
			<div class="panel-body">
				<div class="media seller-profile-media">
                     <div class="media-left">
                        <a href="#">
                           <img class="media-object" src="{{asset('/')}}front-end/images/profile-pic.jpg" width="70" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="#"><h4 class="media-heading">{{$product->supplier->name}}</h4></a>
                        <p><i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                &nbsp;(3.9)<br />
						<small><strong>416 reviews</strong></small>
                        </p>
                    </div>
                </div>
				<div class="row seller-quick-opt">
					<div class="col-xs-4 text-center">
						<a href="#"><i class="fa fa-gift fa-3x" aria-hidden="true"></i>
							<p>Seller Shop</p>
						</a>
					</div>
					<div class="col-xs-4 text-center">
						<a href="#"><i class="fa fa-comment fa-3x" aria-hidden="true"></i>
							<p>Chat Seller</p>
						</a>
					</div>
					<div class="col-xs-4 text-center">
						<a href="#"><i class="fa fa-user-plus fa-3x" aria-hidden="true"></i>
							<p>follow</p>
						</a>
					</div>
				</div>
				<hr>

				<div class="follow-profile-pic">
				<p>This seller has <span>83 followers</span></p>
					<img class="media-object" src="{{asset('/')}}front-end/images/profile-pic.jpg" alt="">
					<img class="media-object" src="{{asset('/')}}front-end/images/profile-pic.jpg"  alt="">
					<img class="media-object" src="{{asset('/')}}front-end/images/profile-pic.jpg"  alt="">
					<img class="media-object" src="{{asset('/')}}front-end/images/profile-pic.jpg"  alt="">
					<img class="media-object" src="{{asset('/')}}front-end/images/profile-pic.jpg"  alt="">
					<img class="media-object" src="{{asset('/')}}front-end/images/profile-pic.jpg"  alt="">
					<img class="media-object" src="{{asset('/')}}front-end/images/profile-pic.jpg"  alt="">
					<img class="media-object" src="{{asset('/')}}front-end/images/profile-pic.jpg"  alt="">
				</div>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-body">
				<h4> (35-60%) DISCOUNT</h4>
				<img src="{{asset('/')}}front-end/images/new-pic4.jpg" alt="" width="100%" />
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>PRODUCTS</h4>
			</div>
			<div class="panel-body">
				<div class="media products-media">
                     <div class="media-left">
                        <a href="#">
                           <img class="media-object" src="{{asset('/')}}front-end/images/profile-pic.jpg" width="70" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="#"><h4 class="media-heading">samsung</h4></a>
                        <h4><strong>$ 685.00 </strong> <small>&nbsp <del>$ 685.00</del></small></h4>
                    </div>
                </div>
				<hr>
				<div class="media products-media">
                     <div class="media-left">
                        <a href="#">
                           <img class="media-object" src="{{asset('/')}}front-end/images/profile-pic.jpg" width="70" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="#"><h4 class="media-heading">samsung</h4></a>
                        <h4><strong>$ 685.00 </strong> <small>&nbsp <del>$ 685.00</del></small></h4>
                    </div>
                </div>
				<hr>
				<div class="media products-media">
                     <div class="media-left">
                        <a href="#">
                           <img class="media-object" src="{{asset('/')}}front-end/images/profile-pic.jpg" width="70" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="#"><h4 class="media-heading">samsung</h4></a>
                        <h4><strong>$ 685.00 </strong> <small>&nbsp <del>$ 685.00</del></small></h4>
                    </div>
                </div>
				<hr>
				<div class="media products-media">
                     <div class="media-left">
                        <a href="#">
                           <img class="media-object" src="{{asset('/')}}front-end/images/profile-pic.jpg" width="70" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="#"><h4 class="media-heading">samsung</h4></a>
                        <h4><strong>$ 685.00 </strong> <small>&nbsp <del>$ 685.00</del></small></h4>
                    </div>
                </div>


			</div>
		</div>   <!--- end product  ------>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>NEWSLETTERS </h4>
			</div>
			<div class="panel-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				</p>
				<div class="form-group">
				<input type="email" class="form-control" placeholder="Email" /><br>
				<button type="button" class="btn btn-my">Sign up</button>
				</div>
			</div>
		</div>


	</div>  <!--- end aside  ------>

</div>
</div>

	<div class="half-width-ad">
		<div class="container">
			<div class="col-md-6">
				<img src="{{asset('/')}}front-end/images/advertise/robi.gif" alt="" width="100%" />
			</div>
			<div class="col-md-6">
				<img src="{{asset('/')}}front-end/images/advertise/tale.gif" alt="" width="100%" />
			</div>
		</div>
	</div>  <!-- end top-ad  --->

<div class="container ">
	<div class="col-md-offset-2 col-md-8">
		<!-- 16:9 aspect ratio -->
		<div class="embed-responsive embed-responsive-16by9">
		  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/AFxCO_DyzYM"></iframe>
		</div>
	</div>
</div>


	<div class="container">
		<div class="col-md-12">
			<div class="top-heading">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<h3>Related Products</h3>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 see-all text-right">
						<p><a href="#">See all Products <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="product-slide">
				<!-- single product  --->
				<div class="product-item">
					<div class="thumbnail">
                        <div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
						<h4>Lorem Ipsum is simply </h4>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$679.87</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.html">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div> <!-- end single product  --->

				<!-- single product  --->
				<div class="product-item">
					<div class="thumbnail">
                        <div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
						<h4>Lorem Ipsum is simply </h4>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$679.87</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.html">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div> <!-- end single product  --->

				<!-- single product  --->
				<div class="product-item">
					<div class="thumbnail">
                        <div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
						<h4>Lorem Ipsum is simply </h4>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$679.87</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.html">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div> <!-- end single product  --->

				<!-- single product  --->
				<div class="product-item">
					<div class="thumbnail">
                        <div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
						<h4>Lorem Ipsum is simply </h4>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$679.87</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.html">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div> <!-- end single product  --->
			</div>
		</div>
	</div>  <!-- end thum-product section  --->



	<div class="full-width-ad">
		<div class="container">
			<div class="col-md-12 text-center">
				<img src="{{asset('/')}}front-end/images/advertise/gp.gif" alt="" width="100%" />
			</div>
		</div>
	</div>  <!-- end top-ad  --->

	<div class="container">
		<div class="col-md-12">
			<div class="top-heading">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<h3>Related Products</h3>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 see-all text-right">
						<p><a href="#">See all Products <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="product-slide">
				<!-- single product  --->
				<div class="product-item">
					<div class="thumbnail">
                        <div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
						<h4>Lorem Ipsum is simply </h4>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$679.87</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.html">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div> <!-- end single product  --->

				<!-- single product  --->
				<div class="product-item">
					<div class="thumbnail">
                        <div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
						<h4>Lorem Ipsum is simply </h4>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$679.87</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.html">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div> <!-- end single product  --->

				<!-- single product  --->
				<div class="product-item">
					<div class="thumbnail">
                        <div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
						<h4>Lorem Ipsum is simply </h4>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$679.87</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.html">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div> <!-- end single product  --->

				<!-- single product  --->
				<div class="product-item">
					<div class="thumbnail">
                        <div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
						<h4>Lorem Ipsum is simply </h4>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$679.87</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.html">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div> <!-- end single product  --->
			</div>
		</div>
	</div>  <!-- end thum-product section  --->

</main>
@endsection
