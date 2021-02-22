<!DOCTYPE HTML>
<head>
<title>Sellbazar</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link href="{{asset('/')}}front-end/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/')}}front-end/fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('/')}}front-end/css/owl.carousel.css">
	<script src="{{asset('/')}}front-end/js/jquery-1.12.0.min.js"></script>
	<link rel="stylesheet" href="{{asset('/')}}front-end/css/megamenu.css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/ionicons.min.css">
	
	<link href="{{asset('/')}}front-end/css/style.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('/')}}front-end/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    @yield('top-script')

</head>

<body>

<header>
	<div class="full-width-ad">
		<div class="container">
			<div class="col-md-12 text-center ">
				<img src="{{asset('/')}}front-end/images/advertise/gp.gif" alt="" width="80%" />
			</div>
		</div>
	</div>  <!-- end top-ad  --->
	
		<div class="top-bar">
		<div class="container">
			<div class="col-md-6 col-sm-5 col-xs-10">
				<div class="call">
					<p><span>Need help?</span> call us <span class="number">+8801860-130003</span></span></p>
				</div>
			</div>
			<div class="col-md-6 col-sm-7 col-xs-2 pull-right">
				<div class="account_desc">
					<ul>
						<li><a href="{{route('customer_login')}}">Login</a></li>
						<li><a href="{{route('customer_registration')}}">Register</a></li>
						<li><a href="https://docs.google.com/forms/d/1yop4lftWEec1DtOamI2RcTdrmh0MjZSm6Th0bUxZGgs/viewform?edit_requested=true">Delivery</a></li>
						
						<li><a href="{{route('customer_account')}}">My Account</a></li>
					</ul>
				</div>
				<button type="button" class="btn btn-menu  dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-bars " aria-hidden="true"></i>
				</button>
				<ul class="dropdown-menu">
					<li><a href="{{route('customer_login')}}">Login</a></li>
					<li><a href="{{route('customer_registration')}}">Register</a></li>
					<li><a href="https://docs.google.com/forms/d/1yop4lftWEec1DtOamI2RcTdrmh0MjZSm6Th0bUxZGgs/viewform?edit_requested=true">Delivery</a></li>
					
					<li><a href="{{route('customer_account')}}">My Account</a></li>
				</ul>
			</div>
		</div>
	</div>   <!-- end top-bar  --->
	<div class="search-cart-bar">
		<div class="container">
			<div class="col-md-8 col-sm-9">
				<div class="input-group">
					<div class="input-group-btn">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Categories <span class="caret"></span></button>
						<ul class="dropdown-menu">
						  <li><a href="#">All Categories</a></li>
						  <li><a href="#">Another action</a></li>
						  <li><a href="#">Something else here</a></li>
						  <li role="separator" class="divider"></li>
						  <li><a href="#">Separated link</a></li>
						</ul>
					</div>
					<input type="text" class="form-control" aria-label="">
					<span class="input-group-btn">
						<button class="btn" type="button">
							<i class="fa fa-search " aria-hidden="true"></i> Search
						</button>
					</span>
				</div>
			</div>   <!-- end search box  --->
			 
			<div class="col-md-4 col-sm-3">
				<div class="input-group">
					<span class="input-group-btn">
						<button class="btn " type="button">
							<a href="{{route('basket')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a> 
						</button>
						
					</span>
					<div class="cart-text"><span>2 items | $</span> 600.00</div>
					<span class="input-group-btn">
						<button class="btn " type="button">
							<span><a href="{{route('customer_wishlist')}}"><i class="fa fa-heart " aria-hidden="true"></i></a></span>
						</button>
					</span>
				</div>
			 </div>  <!-- end cart area  --->
			 
		</div>
	</div> <!-- end search-cart area  --->
	
	<div id="brand-area">
		<div class="container">
			<div class="col-md-4">
				<a href="{{route('/')}}"><img src="{{asset('/')}}front-end/images/logo.jpg" alt="" width="90%" /></a>
			</div>
			<div class="col-md-4">
				<img src="{{asset('/')}}front-end/images/advertise/ad1.jpg" alt="" width="100%" />
			</div>
			<div class="col-md-4">
				<img src="{{asset('/')}}front-end/images/advertise/ad2.jpg" alt="" width="100%" />
			</div>
		</div>
	</div> <!-- end brand area  --->
	
	<div id="main-menu">
		<div class="container">
			<div class="col-md-12">
				<div class="header_bottom">
					<div class="menu">
						<ul>
							<li class="active"><a href="{{route('/')}}">Home</a></li>
							<li><a href="{{route('create_product')}}">Add products</a></li>
							<li><a href="{{route('about')}}">About</a></li>
							<li><a href="{{route('contact')}}">Contact</a></li>
							<div class="clear"></div>
						</ul>
					</div>
					<div class="clear"></div>
				 </div>	
			 </div>
		 </div>
	</div>  <!-- end main menu area  --->
</header>



@yield('body')
<footer>
	<div class="row padding">
		<div class="container">
			<div class="col-md-4">
				<h3>tmiweb.co</h3>
				<p>Our Address | The Rules Of Order</p>
				<hr />
				<h3>Payment Method</h3>
				<img src="{{asset('/')}}front-end/images/payment/bkash.png" alt="" width="25%"/>
				<img src="{{asset('/')}}front-end/images/payment/cash_on_delivery.png" alt="" width="25%" />
			</div>  <!--End footer column 1 -->
			
			<div class="col-md-4 text-center">
				<h3>Website Views</h3>
				<hr />
				<p>Today : 991 Views <br />
				Previous Day : 6389 Views <br />
				Total : 190189 Views</p>
				<hr />
				<p>Your IP : 103.63.159.122 </p>
			</div>   <!--End footer column 2 -->
			
			<div class="col-md-4">
				<h4>1000+ products are being added every day on our website.</h4>
				<p>Subscribe now to get information of all kinds of latest product. </p>
				<form class="newsletter">
                    <input type="text" class="form-control" placeholder="Email">
                    <button class="btn btn-my" type="button">
                        Subscribe
                    </button>
                </form>
				<div class="social-media-group"> 
					<h4>Or, keep eye on</h4>
					<a herf="#" class="facebook"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
					<a herf="#" class="twitter"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
					<a herf="#" class="linkedin"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
					<a herf="#" class="youtube"><i class="fa fa-youtube-square fa-3x" aria-hidden="true"></i></a>
				</div>
			</div>   <!--End footer column 3 -->
		</div>
	</div>
	
	<div class="row padding copyright">
		<div class="container">
			<div class="col-md-12 text-center">
				© All rights Reseverd | Design by  <a href="http://tmiweb.co">tmiweb.co</a> 
			</div>
		</div>
	</div>   <!-- end copyright  -->
	
	<div class="clearfix"></div>

</footer>
<a href="#" id="back-to-top" title="Back to top">
	<img src="{{asset('/')}}front-end/images/arrow_up.png" alt="" />
</a>

	
		<!-- bootstrap js -->
        <script src="{{asset('/')}}front-end/js/bootstrap.js"></script>
		<!-- owl.carousel js -->
        <script src="{{asset('/')}}front-end/js/owl.carousel.min.js"></script>
		<!-- main js -->
        <script src="{{asset('/')}}front-end/js/main.js"></script>
		<!-- megamenu js -->
		<script src="{{asset('/')}}front-end/js/megamenu.js"></script>
	
</body>
</html>

