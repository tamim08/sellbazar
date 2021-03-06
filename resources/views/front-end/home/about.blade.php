@extends('front-end.master')
@section('body')
    <div id="breadcrumb">
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="{{route('/')}}">Home</a></li>
			  <li class="active"> Contact</li>
			</ol>
		</div>  <!-- end breadcrumb --->
	</div>
</div>  <!-- end breadcrumb area  --->


<div class="container">

	<aside>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Pages</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
                    <li><a href="text.html">Text page</a></li>
                    <li><a href="{{route('contact')}}">Contact page</a></li>
                    <li><a href="{{route('faq')}}">FAQ</a></li>
                </ul>
			</div>
		</div>
		
		<div class="banner">
            <a href="#">
                <img src="{{asset('/')}}front-end/images//banner.jpg" alt="sales 2014" class="img-responsive">
            </a>
        </div>
	</div>   <!-- /.col-md-3 -->
	</aside>

	<main>
	<div class="col-md-9" >
		<div class="panel panel-default">
			<div class="panel-body">
				<h1>About</h1>
				<p class="lead">Are you curious about something? Do you have some kind of problem with our products?</p>
				<p>Please feel free to contact us, our customer service center is working for you 24/7.</p>
	
				<hr>
	
				<div class="row">
					<div class="col-sm-4">
						<h3><i class="fa fa-map-marker"></i> Address</h3>
						<p>13/25 New Avenue
							<br>New Heaven
							<br>45Y 73J
							<br>England
							<br>
							<strong>Great Britain</strong>
						</p>
					</div>
					<!-- /.col-sm-4 -->
					<div class="col-sm-4">
						<h3><i class="fa fa-phone"></i> Call center</h3>
						<p class="text-muted">This number is toll free if calling from Great Britain otherwise we advise you to use the electronic form of communication.</p>
						<p><strong>+33 555 444 333</strong>
						</p>
					</div>
					<!-- /.col-sm-4 -->
					<div class="col-sm-4">
						<h3><i class="fa fa-envelope"></i> Electronic support</h3>
						<p class="text-muted">Please feel free to write an email to us or to use our electronic ticketing system.</p>
						<ul>
							<li><strong><a href="mailto:">info@fakeemail.com</a></strong>
							</li>
							<li><strong><a href="#">Ticketio</a></strong> - our ticketing support platform</li>
						</ul>
					</div>
					<!-- /.col-sm-4 -->
				</div>
				<!-- /.row -->
	
				<hr>
	
				<div id="map">
	
				</div>
	
				<hr>
				<h2>Contact form</h2>
	
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
						<div class="col-sm-6">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" class="form-control" id="email">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="subject">Subject</label>
								<input type="text" class="form-control" id="subject">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="message">Message</label>
								<textarea id="message" class="form-control"></textarea>
							</div>
						</div>
	
						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-my"><i class="fa fa-envelope-o"></i> Send message</button>
	
						</div>
					</div>
					<!-- /.row -->
				</form>
			</div>
		</div>
	
	</div> <!-- col-9 end -->
	</main>
	
	
</div>
@endsection