@extends('front-end.master')
@section('body')
    
<div id="breadcrumb">
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="{{route('/')}}">Home</a></li>
			  <li class="active">Checkout - Delivery method</li>
			</ol>
		</div>  <!-- end breadcrumb --->
	</div>
</div>  <!-- end breadcrumb area  --->


<div class="container">
	<main>
	<div class="col-md-9" >
		<form method="post" action="checkout3.html">
			<div class="panel panel-my" id="basket">
				<div class="panel-heading">
					<h1>Checkout - Delivery method</h1>
				</div>
				<div class="panel-body">
					<ul class="nav nav-pills nav-justified nav-pills-my">
                        <li ><a href="{{route('checkout1')}}"><i class="fa fa-map-marker"></i><br>Address</a>
                        </li>
                        <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                        </li>
                    </ul>
					
					<div class="content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
										<h4>USPS Next Day</h4>
										<p>Get it right on next day - fastest option possible.</p>
									</div>
									<div class="panel-footer">
										<div class="radio text-center">
											<label><input type="radio"  name="optionsRadios" id="optionsRadios1" value="option1" checked>
											</label>
										</div>
									</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
										<h4>USPS Next Day</h4>
										<p>Get it right on next day - fastest option possible.</p>
									</div>
									<div class="panel-footer">
										<div class="radio text-center">
											<label><input type="radio" name="optionsRadios" id="optionsRadios1" value="option2">
											</label>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div> <!-- end panel body -->
				

				<div class="panel-footer">
					<div class="pull-left">
						<a href="checkout1.html" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back </a>
					</div>
					<div class="pull-right">
						<a href='{{route('checkout3')}}' type="submit" class="btn btn-my">Continue to Payment Method <i class="fa fa-chevron-right"></i>
						</a>
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