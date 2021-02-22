
<!DOCTYPE HTML>
<head>
<title>create product</title>
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
	<script type="text/javascript" src="{{asset('/')}}front-end/js/easing.js"></script>
	<script src="{{asset('/')}}front-end/js/easyResponsiveTabs.js" type="text/javascript"></script>
	<link href="{{asset('/')}}front-end/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/global.css">
    

</head>

<body>

<header>
	<nav class="navbar navbar-tmiweb">
  <div class="container">
    <div class="col-sm-3 col-xs-12">
        <a href="{{route('/')}}"><img alt="Brand" src="{{asset('/')}}front-end/images/logo.jpg" width="90%" ></a>
    </div>
	<div class="col-sm-6 col-xs-12">
	<div class="progress1">
        <li class="active">Category</li>
        <li class="active">Place</li>
        <li>Product</li>
        <li>Payment</li>
        <li>Success</li>
    </div>
	</div>
	<div class="col-sm-3 col-xs-12">
	<p class="navbar-text">
	<span><i class="fa fa-phone fa-3x" aria-hidden="true"></i></span>
		Need Help? Call us!<br /> <a href="#" class="navbar-link">+8801860-130003</a>
	</p>
	</div>
  </div>
</nav>
</header>
<main>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group categories-list megamenu">
				<ul>
					<a class="list-group-item active">
						<i class="fa fa-bars" aria-hidden="true"></i>Division
					</a>
               @foreach($divisions as $division)
               <li onclick="chooseDiv(this)"><a href="#" class="list-group-item megamenu-caret">
                {{$division->name}}</a>

                    <ul style='background-color:#fff;border:none;' class='sub-menu1'>
                        <li><a href="#"  class="list-group-item active">District</a>
                            <ul>
                                    @foreach($division->districts as $district)
                               <li onclick="chooseDis(this)"><a href="#" class="list-group-item megamenu-caret">{{$district->name}}</a>

                                    <ul class='sub-menu2' style="background-color:#fff;border:none;">
                                        <li><a href="#"  class="list-group-item active">Sub-District</a>
                                            <ul>
                                                    @foreach($district->subdistricts as $subdistrict)
                                                <li onclick="chooseSubDis(this)"><a href="#" class="list-group-item megamenu-caret" > {{$subdistrict->name}}</a>

                                                    <ul class='sub-menu3' style="background-color:#fff;border:none;">
                                                        <li><a href="#"  class="list-group-item active">Area</a>
                                                            <ul>
                                                                    @foreach($subdistrict->areas as $area)
                                                                <li><a class="list-group-item megamenu-caret" href="{{route('create_product3')}}?area={{$area->id}}">{{$area->name}}</a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>

                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>


                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>

            </li>
               @endforeach
				

				</ul>
            </div>
        </div> <!-- end mega menu area  --->
    </div>
</div>


</main>


<div class="container">
	<div class="col-xs-12 create-product-controls">
		<a href="{{route('create_product2')}}"><button type="button" class="btn btn-my pull-right">Skip</button></a>
	</div>
</div>

<script>
        window.localStorage.setItem("sub","{{request()->sub}}");
        window.localStorage.setItem("area","");
        chooseDiv=el=>{
            $(".sub-menu1").css("display","none");
            el.children[1].style.display="block";
        }
        chooseDis=el=>{
            $(".sub-menu2").css("display","none");
            el.children[1].style.display="block";
        }
        chooseSubDis=el=>{
            $(".sub-menu3").css("display","none");
            el.children[1].style.display="block";
        }


        </script>

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
