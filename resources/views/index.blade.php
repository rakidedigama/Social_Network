@extends('layouts.layout')

@section('pageTitle','Social Network')

@section('content')
	
	<div class="fh5co-loader"></div>
	
	<div id="page">
		@include('layouts.nav', ['some' => 'data'])
	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url({{ url('/images/Slider.jpg') }});">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Social network <span>that</span> Rocks</h1>
									<h2 class="font-roboto-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br> Quisque eleifend justo mauris.</h2>
									<p><a class="btn btn-lg btn-slid-log" href="#">Register</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url({{ url('/images/Slider.jpg') }});">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Social network <span>that</span> Rocks</h1>
									<h2 class="font-roboto-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br> Quisque eleifend justo mauris.</h2>
									<p><a class="btn btn-lg btn-slid-log" href="#">Register</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url({{ url('/images/Slider.jpg') }});">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Social network <span>that</span> Rocks</h1>
									<h2 class="font-roboto-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br> Quisque eleifend justo mauris.</h2>
									<p><a class="btn btn-lg btn-slid-log" href="#">Register</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>		   	
		  	</ul>
	  	</div>
	</aside>
	<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="left-side-home">
						<h4 class="section-head"><i class="icon-location2"></i> NEIGHBORHOOD</h4>
						<div class="checkbox checkbox-danger">
                <input id="checkbox1" type="checkbox" checked>
                <label for="checkbox1">
                    New Dehli
                </label>
            </div>
            <h4 class="section-head"><i class="icon-home"></i> All proucts</h4>
            <ul>
            	<li>
								<div class="checkbox checkbox-danger">
	                <input id="checkbox2" type="checkbox" checked>
	                <label for="checkbox2">
	                    New Dehli
	                </label>
		            </div>
            	</li>
            	<li>
								<div class="checkbox checkbox-danger">
	                <input id="checkbox3" type="checkbox" >
	                <label for="checkbox3">
	                    New Dehli
	                </label>
		            </div>
            	</li>
            	<li>
								<div class="checkbox checkbox-danger">
	                <input id="checkbox4" type="checkbox" >
	                <label for="checkbox4">
	                    New Dehli
	                </label>
		            </div>
            	</li>
            	<li>
								<div class="checkbox checkbox-danger">
	                <input id="checkbox5" type="checkbox" >
	                <label for="checkbox5">
	                    New Dehli
	                </label>
		            </div>
            	</li>
            	<li>
								<div class="checkbox checkbox-danger">
	                <input id="checkbox6" type="checkbox" >
	                <label for="checkbox6">
	                    New Dehli
	                </label>
		            </div>
            	</li>
            	<li>
								<div class="checkbox checkbox-danger">
	                <input id="checkbox7" type="checkbox" >
	                <label for="checkbox7">
	                    New Dehli
	                </label>
		            </div>
            	</li>
            	<li>
								<div class="checkbox checkbox-danger">
	                <input id="checkbox8" type="checkbox" >
	                <label for="checkbox8">
	                    New Dehli
	                </label>
		            </div>
            	</li>
            	<li>
								<div class="checkbox checkbox-danger">
	                <input id="checkbox9" type="checkbox" >
	                <label for="checkbox9">
	                    New Dehli
	                </label>
		            </div>
            	</li>
            	<li>
								<div class="checkbox checkbox-danger">
	                <input id="checkbox0" type="checkbox" >
	                <label for="checkbox0">
	                    New Dehli
	                </label>
		            </div>
            	</li>
            	<li>
								<div class="checkbox checkbox-danger">
	                <input id="checkbox11" type="checkbox" >
	                <label for="checkbox11">
	                    New Dehli
	                </label>
		            </div>
            	</li>
            	<li>
								<div class="checkbox checkbox-danger">
	                <input id="checkbox12" type="checkbox" >
	                <label for="checkbox12">
	                    New Dehli
	                </label>
		            </div>
            	</li>
            	<li>
								<div class="checkbox checkbox-danger">
	                <input id="checkbox13" type="checkbox" >
	                <label for="checkbox13">
	                    New Dehli
	                </label>
		            </div>
            	</li>
            	<li>
								<div class="checkbox checkbox-danger">
	                <input id="checkbox14" type="checkbox" >
	                <label for="checkbox14">
	                    New Dehli
	                </label>
		            </div>
            	</li>
            	<li>
								<div class="checkbox checkbox-danger">
	                <input id="checkbox15" type="checkbox" >
	                <label for="checkbox15">
	                    New Dehli
	                </label>
		            </div>
            	</li>
            </ul>
					</div>
				</div>
				<div class="col-md-9">
					<div class="right-side-home">
						<div id="custom-search-input">
              <div class="span12">
				        <form id="custom-search-form" class="form-search form-horizontal">
				            <div class="input-append span12">
				                <input type="text" class="search-query" placeholder="Search">
				                <button type="submit" class="btn"><i class="icon-search"></i></button>
				            </div>
				        </form>
      				</div>
						</div>
						<div class="product-list">
							<div class="row">
								<div class="col-md-4">
									<img src="images/Iron.jpg">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg">
									<p>Product Name</p>
								</div>
							</div>
						</div>
					</div>
							<div class="row">
								<div class="col-md-12">
									<div class="page-nation home-pagina">
                    <ul class="pagination pagination-large">
                      <li class="disabled"><span><i class="icon-arrow-left"></i> Previous</span></li>
                      <li class="active"><span>1</span></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">6</a></li>
                      <li><a href="#">7</a></li>
                      <li><a href="#">8</a></li>
                      <li><a href="#">9</a></li>
                      <li class="disabled"><span>...</span></li><li>
                      <li><a rel="next" href="#">Next <i class="icon-arrow-right"></i></a></li>
                 		</ul>
                  </div>
								</div>
							</div>
			</div>
		</div>
	</div>

	</div>

@endsection