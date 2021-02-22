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
	<link href="{{asset('/')}}front-end/css/slider.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="{{asset('/')}}front-end/js/easing.js"></script>
	<script src="{{asset('/')}}front-end/js/easyResponsiveTabs.js" type="text/javascript"></script>
	<link href="{{asset('/')}}front-end/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="{{asset('/')}}front-end/css/global.css">
	<link rel="stylesheet" href="{{asset('/')}}admin/plugins/summernote/summernote-bs4.css">
	<link rel="stylesheet" href="{{asset('/')}}admin/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="{{asset('/')}}admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>

<body>

	<header>
		<nav class="navbar navbar-tmiweb">
			<div class="container">
				<div class="col-sm-3 col-xs-12">
					<a href="{{route('/')}}"><img alt="Brand" src="{{asset('/')}}front-end/images/logo.jpg"
							width="90%"></a>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="progress1">
						<li class="active">Category</li>
						<li class="active">Place</li>
						<li class="active">Product</li>
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
			<div class="col-xs-12 create-product-controls">
				<button type="button" class="btn btn-my pull-right">Next</button>
			</div>
		</div>

		<form method="post" enctype="multipart/form-data" action="{{URL::to('/')}}/add-product">
			@csrf
			<div class="container">
				<div class="row ">
					<div class="col-md-12 ">
						<h4>Upload Your Product Images</h4>
						<p>Upload clear and good quality pictures. At least one image is mandatory and should be bigger
							than
							500 x 500</p>
					</div>
				</div>
				<div class="row create-product-upload">
					<div class="col-md-3 ">
						<p>Main Photo 1/4</p>
						<div class="input-file">
							<input type="file" name="image[]" />
						</div>
					</div>
					<div class="col-md-3 ">
						<p>Main Photo 1/4</p>
						<div class="input-file">
							<input type="file" name="image[]" />
						</div>
					</div>
					<div class="col-md-3 ">
						<p>Main Photo 1/4</p>
						<div class="input-file">
							<input type="file" name="image[]" />
						</div>
					</div>
					<div class="col-md-3 ">
						<p>Main Photo 1/4</p>
						<div class="input-file">
							<input type="file" name="image[]" />
						</div>
					</div>
					<div class="col-md-12">
						<button type="button" class="btn btn-my" data-toggle="modal" data-target="#image-upload">More
							upload</button>

						<!-- Modal -->
						<div id="image-upload" class="modal fade" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">More Products Upload</h4>
									</div>
									<div class="modal-body">
										<input type="file" name="image[]">
										<input type="file" name="image[]">
										<input type="file" name="image[]">
										<input type="file" name="image[]">
										<input type="file" name="image[]">
										<input type="file" name="image[]">
										<input type="file" name="image[]">
										<input type="file" name="image[]">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-my">Submit</button>
										<button type="button" class="btn btn-default"
											data-dismiss="modal">Close</button>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row ">
					<div class="col-md-12 ">
						<h4>Product Details</h4>
					</div>
				</div>
				<div class="row ">
					<div class="col-md-12 ">
						<div class="create-product-details">

							<div class="form-group">
								<label for="name" class=" control-label">Product Name *</label>
								
									<input name="name" type="text" class="form-control" id="name" placeholder="Insert Product Name">
								
							</div>
				

							<div class="form-group">
								<label for="name" class=" control-label">Deal Code *</label>
							
									<input name="code" type="text" class="form-control" id="name" placeholder="Insert Deal code">
								
							</div>
							<div class="form-group">
								<label for="name" class=" control-label">Short Description *</label>
								<textarea name="short_description" class="textarea" rows="4"></textarea>
							</div>

							<div class="form-group">
								<label for="name" class=" control-label">Long Description *</label>
								<textarea name="description" class="textarea" rows="4"></textarea>
							</div>

							<div class="form-group">
								<label>Brand</label>
								<select name="brand_id" class="form-control" 
									data-placeholder="Select Brand" >
									@foreach ($brands as $brand)
									<option value="{{$brand->id}}">
										{{$brand->name}}
									</option>
									@endforeach
								</select>
							</div>

							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="Item">Item weight *</label>
										<input name="weight" type="text" class="form-control " id="Item"
											placeholder="Please insert a valid number">
									</div>
								</div>
								<div class="col-md-3">
									<div class=" form-group">
										<label for="Category">Category *</label>
										<select name="weight_type_id" class="form-control" id="Category">
											@foreach($weightTypes as $type)
											<option value="{{$type->id}}">{{$type->name}}</option>
											@endforeach
										</select>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row ">
					<div class="col-md-12 ">
						<h4>Product Quantity & Price</h4>
					</div>
				</div>
				<div class="row ">
					<div class="col-md-12 ">
						<div class="create-product-details">
							<div class="form-group">
								<label for="Quantity">Quantity *</label>
								<input name="quantity" type="number" class="form-control width-control" id="Quantity" placeholder="...">
							</div>

							<div class="form-group">
								<label for="Price">Price with tax *</label>
								<input name="price" type="text" class="form-control width-control" id="Price" placeholder="Price">
							</div>
							<label>Product Condition</label>
							<div class="radio">
								<label>
									<input value="Used" name="product_condition" type="radio">&nbsp Used
								</label>
								<label>
									<input value="New" name="product_condition" type="radio">&nbsp New
								</label>
							</div>
							<label>Listing duration (in days)</label>
							<div class="radio">
								<label>
									<input value="90" name="duration" type="radio">&nbsp 90 days &nbsp
								</label>
								<label>
									<input value="-1" name="duration" type="radio">&nbsp Never Delete This Product
								</label>
							</div>
							<div class="form-group">
								<label>Color</label>
								<select name="colors[]" class="select2" multiple="multiple"
									data-placeholder="Select a State" style="width: 100%;">
									@foreach ($colors as $color)
									<option value="{{$color->id}}">
										{{$color->name}}
									</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Size</label>
								<select name="sizes[]" class="select2" multiple="multiple"
									data-placeholder="Select a State" style="width: 100%;">
									@foreach ($sizes as $size)
									<option value="{{$size->id}}">
										{{$size->name}}
									</option>
									@endforeach
								</select>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="col-xs-12 create-product-controls">
					<button type="submit" class="btn btn-my pull-right">Next</button>
				</div>
			</div>
			<input type="hidden" name="area_id" id="area">
			<input type="hidden" name="sub_category_id" id="subcategory">
		</form>



	</main>






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
<script>

</script>
<script src="{{asset('/')}}/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="{{asset('/')}}/admin/plugins/select2/js/select2.full.min.js"></script>
<script>
	$(function () {
		// Summernote
		@if (request() -> area)
			$("#area").val("{{request()->area}}");
		@endif
		$("#subcategory").val(localStorage.getItem("sub"));
		$('.textarea').summernote()
		$('.select2').select2()
	})
</script>



</html>