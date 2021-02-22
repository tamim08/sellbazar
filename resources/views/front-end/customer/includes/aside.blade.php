<aside>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Customer section</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked nav-pills-my">
					<li >
                        <a href="{{route('customer_account')}}"><i class="fa fa-user"></i> My account</a>
                    </li>
                    <li class="active">
                        <a href="{{route('customer_order')}}"><i class="fa fa-list"></i> My orders</a>
                    </li>
                    <li>
                        <a href="{{route('customer_wishlist')}}"><i class="fa fa-heart"></i> My wishlist</a>
                    </li>
                    <li>
                        <a href="index.html"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
			</div>
		</div>
		
	</div>   <!-- /.col-md-3 -->
	</aside>