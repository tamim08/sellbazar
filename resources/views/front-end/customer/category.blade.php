@extends('front-end.master')
@section('body')
    
<div id="breadcrumb">
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="{{route('/')}}">Home</a></li>
			  <li class="active">Category</li>
			</ol>
		</div>  <!-- end breadcrumb --->
	</div>
</div>  <!-- end breadcrumb area  --->


<div class="container">
	<main>
        <center>
                <h3>{{$category->name}}</h3>
                <img src="{{URL::to('/images').'/'.$category->image}}">
        </center>
    </main>
    </div>
    <b>
        Working product section
    </b>

    @endsection