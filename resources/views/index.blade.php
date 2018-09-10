@extends('layouts.layout')

@section('pageTitle','Social Network')

@section('content')
	
	<div class="fh5co-loader"></div>
	<div id="page">
		@include('layouts.nav', ['active' => 'index'])
		<aside id="fh5co-hero" class="js-fullheight">
			<div class="flexslider js-fullheight">
				<ul class="slides">
			   		<li style="background-image: url({{ url('/images/image-1.jpg') }});">
				   		<div class="overlay-gradient"></div>
				   		<div class="container">
				   			<div class="row">
					   			<div class="col-md-8 col-md-offset-2 text-center  ">
					   				<div class="slider-text-inner slider-text js-fullheight">
					   					<h1>Discover</h1>
											<h2 class="font-roboto-300">Find your favorite book among hundreds of member uploaded collections.</h2>
										
					   				</div>
					   				<div class="sldier-text-right">
					   					<p>“There are worse crimes than burning books.  <br>
					   						One is not reading them.”</p>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				   	<li style="background-image: url({{ url('/images/image-2.jpg') }});">
				   		<div class="overlay-gradient"></div>
				   		<div class="container">
				   			<div class="row">
					   			<div class="col-md-8 col-md-offset-2 text-center  ">
					   				<div class="slider-text-inner slider-text js-fullheight">
					   					<h1>Share</h1>
										<h2 class="font-roboto-300">
											Give back to the community by adding the books <br> that you’d like to share.
										</h2>
					   				</div>
					   				<div class="sldier-text-right">
										<p>“A site of the readers, by the readers,<br> for
										the readers. “</p>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				   	<li style="background-image: url({{ url('/images/image-3.jpg') }});">
				   		<div class="overlay-gradient"></div>
				   		<div class="container">
				   			<div class="row">
					   			<div class="col-md-8 col-md-offset-2 text-center ">
					   				<div class="slider-text-inner js-fullheight slider-text">
					   					<h1>Connect</h1>
										<h2 class="font-roboto-300">Meet and make friends with like-minded readers </h2>
					   				</div>
					   				<div class="sldier-text-right">
										<p>“Books are letters shared between us, adding a
										layer of <br> conversation beyond spoken words.”</p>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
			   		</li>		   	
			  	</ul>
		  	</div>
		</aside>
	</div>

@endsection
