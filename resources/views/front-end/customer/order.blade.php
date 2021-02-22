@extends('front-end.master')

@section('body')
    
<div id="breadcrumb">
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="{{route('/')}}">Home</a></li>
			  <li><a href="{{route('customer_order')}}"> My orders</a></li>
			  <li class="active">Order # 1735</li>
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
					<h1>Order #1735</h1>
					<h4>Order #1735 was placed on <strong>22/06/2013</strong> and is currently <strong>Being prepared</strong>.</h4>
					<p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
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
									<td>2</td>
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
									<td>1</td>
									<td>$200.00</td>
									<td>$0.00</td>
									<td>$200.00</td>
								</tr>
							</tbody>
							<tfoot>
                                <tr>
                                    <th colspan="5" class="text-right">Order subtotal</th>
                                    <th>$446.00</th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right">Shipping and handling</th>
                                    <th>$10.00</th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right">Tax</th>
                                    <th>$0.00</th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right">Total</th>
                                    <th>$456.00</th>
                                </tr>
                            </tfoot>
						</table>
					</div> <!-- /.table-responsive -->
				</div>
				
			</div>
		</form>
		
		<div class="col-md-6">
            <h2>Invoice address</h2>
            <p>John Brown
                <br>13/25 New Avenue
                <br>New Heaven
                <br>45Y 73J
                <br>England
                <br>Great Britain</p>
        </div>
        <div class="col-md-6">
            <h2>Shipping address</h2>
            <p>John Brown
                <br>13/25 New Avenue
                <br>New Heaven
                <br>45Y 73J
                <br>England
                <br>Great Britain</p>
        </div>
		
		
	</div> <!-- col-9 end -->
	</main>
	
	
</div> <!--end container -->
@endsection