@extends('front-end.master')

@section('body')
    <div id="breadcrumb">
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="{{route('/')}}">Home</a></li>
			  <li class="active">Shopping cart</li>
			</ol>
		</div>  <!-- end breadcrumb --->
	</div>
</div>  <!-- end breadcrumb area  --->


<div class="container">
	<main>
	<div class="col-md-9" >
		<form method="post" action="checkout1.html">
			<div class="panel panel-my" id="basket">
				<div class="panel-heading">
					<h1>Shopping cart</h1>
					<p class="text-muted">You currently have 3 item(s) in your cart.</p>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th colspan="2">Product</th>
									<th>Quantity</th>
									<th>Unit price</th>
									<th>Discount</th>
									<th colspan="2">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<a href="#">
											<img src="{{asset('/')}}front-end/images/detailsquare.jpg" alt="White Blouse Armani">
										</a>
									</td>
									<td><a href="#">White Blouse Armani White Blouse Armani White Blouse Armani</a>
									</td>
									<td>
										<input type="number" value="2" class="form-control">
									</td>
									<td>$123.00</td>
									<td>$0.00</td>
									<td>$246.00</td>
									<td><a href="#"><i class="fa fa-trash-o"></i></a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="#">
											<img src="{{asset('/')}}front-end/images/basketsquare.jpg" alt="Black Blouse Armani">
										</a>
									</td>
									<td><a href="#">Black Blouse Armani</a>
									</td>
									<td>
										<input type="number" value="1" class="form-control">
									</td>
									<td>$200.00</td>
									<td>$0.00</td>
									<td>$200.00</td>
									<td><a href="#"><i class="fa fa-trash-o"></i></a>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="5">Total</th>
									<th colspan="2">$446.00</th>
								</tr>
							</tfoot>
						</table>
					</div> <!-- /.table-responsive -->
				</div>
				

				<div class="panel-footer">
					<div class="pull-left">
						<a href="category.html" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
					</div>
					<div class="pull-right">
						<button class="btn btn-default"><i class="fa fa-refresh"></i> Update basket</button>
						<a href='{{route('checkout1')}}' type="submit" class="btn btn-my">Proceed to checkout <i class="fa fa-chevron-right"></i>
						</a>
					</div>
					<div class="clearfix"></div>
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
	
	
	<aside>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Order summary</h3>
			</div>
			<div class="panel-body">
				<p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<td>Order subtotal</td>
								<th>$446.00</th>
							</tr>
							<tr>
								<td>Shipping and handling</td>
								<th>$10.00</th>
							</tr>
							<tr>
								<td>Tax</td>
								<th>$0.00</th>
							</tr>
							<tr class="total">
								<td>Total</td>
								<th>$456.00</th>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Coupon code</h3>
			</div>
			<div class="panel-body">
				<p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
				<div class="input-group">
					<input type="text" class="form-control" />
					<span class="input-group-btn">
						<button class="btn btn-my" type="button"><i class="fa fa-gift"></i></button>
				    </span>
				</div>
			</div>
		</div>
	</div>   <!-- /.col-md-3 -->
	</aside>
</div> <!--end container -->
@endsection
