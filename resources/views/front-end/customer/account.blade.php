@extends('front-end.master')

@section('body')
    <div id="breadcrumb">
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="{{route('/')}}">Home</a></li>
			  <li class="active"> My account</li>
			</ol>
		</div>  <!-- end breadcrumb --->
	</div>
</div>  <!-- end breadcrumb area  --->


<div class="container">

	@include('front-end.customer.includes.aside')


	<main>
	<div class="col-md-9" >
		<div class="panel panel-default">
			<div class="panel-body">
				<h1>My account</h1>
				<p class="lead">Change your personal details or your password here.</p>
				<p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
		
				<h3>Change password</h3>
		
				<form>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="password_old">Old password</label>
								<input type="password" class="form-control" id="password_old">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="password_1">New password</label>
								<input type="password" class="form-control" id="password_1">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="password_2">Retype new password</label>
								<input type="password" class="form-control" id="password_2">
							</div>
						</div>
					</div>
					<!-- /.row -->
		
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-my"><i class="fa fa-save"></i> Save new password</button>
					</div>
				</form>
		
				<hr>
		
				<h3>Personal details</h3>
				<form>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="firstname">Firstname</label>
								<input type="text" class="form-control" id="firstname">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="lastname">Lastname</label>
								<input type="text" class="form-control" id="lastname">
							</div>
						</div>
					</div>
					<!-- /.row -->
		
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="company">Company</label>
								<input type="text" class="form-control" id="company">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="street">Street</label>
								<input type="text" class="form-control" id="street">
							</div>
						</div>
					</div>
					<!-- /.row -->
		
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="city">Company</label>
								<input type="text" class="form-control" id="city">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="zip">ZIP</label>
								<input type="text" class="form-control" id="zip">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="state">State</label>
								<select class="form-control" id="state"></select>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="country">Country</label>
								<select class="form-control" id="country"></select>
							</div>
						</div>
		
						<div class="col-sm-6">
							<div class="form-group">
								<label for="phone">Telephone</label>
								<input type="text" class="form-control" id="phone">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" class="form-control" id="email">
							</div>
						</div>
						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-my"><i class="fa fa-save"></i> Save changes</button>
		
						</div>
					</div>
				</form>
			</div> <!-- end panel-body -->
		</div>
	
	</div> <!-- col-9 end -->
	</main>
	
	
</div> <!--end container -->
@endsection