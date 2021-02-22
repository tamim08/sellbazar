@extends('front-end.master')

@section('body')
   <div id="breadcrumb">
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="{{route('/')}}">Home</a></li>
			  <li class="active">My wishlist</li>
			</ol>
		</div>  <!-- end breadcrumb --->
	</div>
</div>  <!-- end breadcrumb area  --->


<div class="container">
    @include('front-end.customer.includes.aside')

	<main>
	<div class="col-md-9" >
		
		<form method="post" action="checkout1.html">
			<div class="panel panel-my" id="basket">
				<div class="panel-heading">
					<h1>My wishlist</h1>
					<p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
				</div>
				<div class="panel-body">
				
				</div>
				
			</div>
		</form>
		
		<div class="row">
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
							<div class="product-thum-img"><a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
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
							<div class="product-thum-img"><a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
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
							<div class="product-thum-img"><a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
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
							<div class="product-thum-img"><a href="preview.html"><img src="{{asset('/')}}front-end/images/feature-pic4.jpg" alt="" /></a></div>
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
		</div>
		<!-- end Related product  --->
		
	</div> <!-- col-9 end -->
	</main>
	
	
</div> <!--end container --> 
@endsection