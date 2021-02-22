@extends('front-end.master')
@section('body')
    <div id="breadcrumb">
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="{{route('/')}}">Home</a></li>
			  <li class="active"> Checkout - Order review</li>
			</ol>
		</div>  <!-- end breadcrumb --->
	</div>
</div>  <!-- end breadcrumb area  --->


<div class="container">
	<main>
	<div class="col-md-9" >
		<form method="post" action="checkout4.html">
			<div class="panel panel-my" id="basket">
				<div class="panel-heading">
					<h1>Checkout - Order review</h1>
				</div>
				<div class="panel-body">
					<ul class="nav nav-pills nav-justified nav-pills-my">
                        <li ><a href="{{route('checkout1')}}"><i class="fa fa-map-marker"></i><br>Address</a>
                        </li>
                        <li ><a href="{{route('checkout2')}}"><i class="fa fa-truck"></i><br>Delivery Method</a>
                        </li>
                        <li ><a href="{{route('checkout3')}}"><i class="fa fa-money"></i><br>Payment Method</a>
                        </li>
                        <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                        </li>
                    </ul>
					
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th colspan="2">Product</th>
									<th>Quantity</th>
									<th>Unit price</th>
									<th>Discount</th>
									<th>Total</th>
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
				</div> <!-- end panel body -->
				

				<div class="panel-footer">
					<div class="pull-left">
						<a href="checkout3.html" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back </a>
					</div>
					<div class="pull-right">
						<button type="submit" class="btn btn-my">Place an order <i class="fa fa-chevron-right"></i>
						</button>
					</div>
					<div class="clearfix"></div>
				</div> <!-- end panel body -->
			</div>
		</form>
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