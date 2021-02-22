@extends('front-end.master')

@section('body')
    <div id="slider-area">
    <div class="container">
        <div class="col-md-3">
            <div class="list-group categories-list megamenu">
				<ul class='megamenu-5'>
					<a class="list-group-item active">
						<i class="fa fa-bars" aria-hidden="true"></i>Categories
					</a>
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
        </div> <!-- end mega menu area  --->

        <div class="col-md-9">
            <div id="slider" class="owl-carousel owl-theme">
                <div class="item"><img src="{{asset('/')}}front-end/images/slider/01.jpg" alt=""></div>
                <div class="item"><img src="{{asset('/')}}front-end/images/slider/02.jpg" alt=""></div>
            </div>
            <div class="col-md-4 col-sm-4 text-center slider-content">
                <h4>UP TO 70% OFF</h4>
                <p>On House Hold Items</p>
            </div>
            <div class="col-md-4 col-sm-4 text-center slider-content ">
                <h4>BUY ONE GET ONE</h4>
                <p>All Formal Shows</p>
            </div>
            <div class="col-md-4 col-sm-4 text-center slider-content ">
                <h4>UP TO 70% OFF</h4>
                <p>On Smart Phones</p>
            </div>
        </div>
    </div>
</div>  <!--end Slider Area -->


<main>
	<div id="brand-ad">
		<div class="container">
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 >Deals of the week !!</h4>
					</div>
					<div class="panel-body">
						<img src="{{asset('/')}}front-end/images/advertise/ad4.jpg" alt="" width="100%" />
					</div>
				</div>
			</div>
			<div class="col-md-9 product-tabs">
				<ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">BRANDS OF THE WEEK</a></li>
                    <li><a data-toggle="tab" href="#menu1">FASHION BRANDS</a></li>
					<li><a data-toggle="tab" href="#menu3">MOBILE BRANDS</a></li>
                </ul>
                <div class="tab-content">
					<div id="home" class="tab-pane fade in active">


						<div class="row text-center">
							<div class="col-sm-3">
								<img src="{{asset('/')}}front-end/images/Samsung_logo.png" alt="" width="80%" />
							</div>
							<div class="col-sm-3">
								<img src="{{asset('/')}}front-end/images/MSFT_logo.png" alt="" width="80%" />
							</div>
							<div class="col-sm-3">
								<img src="{{asset('/')}}front-end/images/Samsung_logo.png" alt="" width="80%" />
							</div>
							<div class="col-sm-3">
								<img src="{{asset('/')}}front-end/images/MSFT_logo.png" alt="" width="80%" />
							</div>
						</div> <!-- End home tab content row 2 -->

						<div class="row text-center">
							<div class="col-sm-3">
								<img src="{{asset('/')}}front-end/images/MSFT_logo.png" alt="" width="80%" />
							</div>
							<div class="col-sm-3">
								<img src="{{asset('/')}}front-end/images/Samsung_logo.png" alt="" width="80%" />
							</div>
							<div class="col-sm-3">
								<img src="{{asset('/')}}front-end/images/MSFT_logo.png" alt="" width="80%" />
							</div>
							<div class="col-sm-3">
								<img src="{{asset('/')}}front-end/images/Samsung_logo.png" alt="" width="80%" />
							</div>
						</div> <!-- End home tab content row 3 -->

						<div class="row text-center">
							<div class="col-sm-3">
								<img src="{{asset('/')}}front-end/images/Samsung_logo.png" alt="" width="80%" />
							</div>
							<div class="col-sm-3">
								<img src="{{asset('/')}}front-end/images/MSFT_logo.png" alt="" width="80%" />
							</div>
							<div class="col-sm-3">
								<img src="{{asset('/')}}front-end/images/Samsung_logo.png" alt="" width="80%" />
							</div>
							<div class="col-sm-3">
								<img src="{{asset('/')}}front-end/images/MSFT_logo.png" alt="" width="80%" />
							</div>
						</div> <!-- End home tab content row 4 -->
                    </div>  <!-- End home tab content  -->

                    <div id="menu1" class="tab-pane fade">
                       <h4>Same this</h4>
                    </div>  <!-- End fashion tab content  -->
                    <div id="menu3" class="tab-pane fade">
                       <h4>Same this</h4>
                    </div>   <!-- End MOBILE tab content  -->

                </div>  <!--- end Tab-content  ------>
			</div>  <!--- end Tab  ------>
		</div>
	</div>

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
					<h3>New Products</h3>
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
                @foreach ( $newProducts as  $newProduct)
				<div class="product-item">
					<div class="thumbnail">
                        <a href="{{route('product_details',['id'=>$newProduct->id])}}"><div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}/images/{{$newProduct->productImages[0]["src"]}}" alt="" /></a></div></a>
						<h4>{{$newProduct->name}}</h4>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">${{$newProduct->price}}</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.html">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
                </div> <!-- end single product  --->
                @endforeach

			</div>
		</div>
	</div>  <!-- end thum-product section  --->

	<div class="container">
		<div class="col-md-12">
			<div class="top-heading">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<h3>New Products</h3>
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
                        <a href="product-details.html"><div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div></a>
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
                        <a href="product-details.html"><div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div></a>
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
                        <a href="product-details.html"><div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div></a>
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
                        <a href="product-details.html"><div class="product-thum-img"<a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div></a>
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

	
	<div id="about">
		<div class="row">
			<div class="container">
				<div class="col-md-6">
					<div class="about-img">
						<img src="{{asset('/')}}front-end/images/slider/01.jpg" alt="" width="530px" height="245px" />
					</div>
				</div>
				<div class="col-md-6">
					<h2>WHAT IS TMIWEB.CO </h2>
					<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed justo massa,
					venenatis sit amet lorem sit amet, dignissim laoreet tortor.
					Nunc iaculis ligula non dolor vulputate, a vulputate diam viverra.
					Etiam egestas gravida lorem at varius. Suspendisse et tortor quis massa
					rutrum eleifend non nec dui. Praesent luctus convallis urna. Phasellus non
					tempor odio, sed faucibus arcu. Duis id convallis odio. Proin sit amet enim
					scelerisque, convallis metus mollis, varius turpis.
					</p>
					<button class="btn btn-my" type="button"> Click Here</button>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row padding">
				<div class="col-md-6">
					<div class="col-sm-12" >
						<div class="icon-wrapper">
							<i class="fa fa-search fa-2x" aria-hidden="true"></i>
						</div>
						<h3 class="text-center"> HOW TO BUY ? </h3>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed justo massa,
						venenatis sit amet lorem sit amet, dignissim laoreet tortor.
						Nunc iaculis ligula non dolor vulputate, a vulputate diam viverra.
						Etiam egestas gravida lorem at varius. Suspendisse et tortor quis massa
						rutrum eleifend non nec dui.
						Etiam egestas gravida lorem at varius. Suspendisse et tortor quis massa
						rutrum eleifend non nec dui.
						</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-sm-12" >
						<div class="icon-wrapper">
							<i class="fa fa-search fa-2x" aria-hidden="true"></i>
						</div>
						<h3 class="text-center"> HOW TO BUY ? </h3>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed justo massa,
						venenatis sit amet lorem sit amet, dignissim laoreet tortor.
						Nunc iaculis ligula non dolor vulputate, a vulputate diam viverra.
						Etiam egestas gravida lorem at varius. Suspendisse et tortor quis massa
						rutrum eleifend non nec dui.
						Etiam egestas gravida lorem at varius. Suspendisse et tortor quis massa
						rutrum eleifend non nec dui.
						</p>
					</div>
				</div>
				<div class="clearfix"></div>
				<hr class="bottom-hr"/>
			</div>
		</div>
	</div> <!-- end about  --->

	<div class="full-width-ad">
		<div class="container">
			<div class="col-md-12 text-center">
				<img src="{{asset('/')}}front-end/images/advertise/gp.gif" alt="" width="100%" />
			</div>
		</div>
	</div>  <!-- end top-ad  --->

</main>
@endsection
