@extends('front-end.master')

@section('body')
    <div id="breadcrumb">
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="{{route('/')}}">Home</a></li>
			  <li class="active">Page not found</li>
			</ol>
		</div>  <!-- end breadcrumb --->
	</div>
</div>  <!-- end breadcrumb area  --->

<div class="container">

        <div class="col-sm-6 col-sm-offset-3">
            <div class="error-page">

                <a href="#">
                    <img src="{{asset('/')}}front-end/images/logo.jpg" alt="" width="60%">
                </a>

                <h3>We are sorry - this page is not here anymore</h3>
                <h4 class="text-muted">Error 404 - Page not found</h4>

                <p>To continue please use the <strong>Search form</strong> or <strong>Menu</strong> above.</p>

                <a href="{{route('/')}}" type="button" class="btn btn-my"><i class="fa fa-home"></i> Go to Homepage</a>
                </a>
            </div>
        </div>


</div>

@endsection

