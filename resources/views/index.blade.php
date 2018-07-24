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
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Discover</h1>
									<h2 class="font-roboto-300">Find your favorite book among hundredsof member uploaded collections.</h2>
								
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
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Share</h1>
									<h2 class="font-roboto-300">Give back to the community by adding the
books <br> that you’d like to share.</h2>
									
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
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Connect</h1>
									<h2 class="font-roboto-300">Meet and make friends
with like-minded readers </h2>
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
	<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="left-side-home">
						<h4 class="section-head"><i class="icon-location2"></i> NEIGHBORHOOD</h4>
			<div class="row form-group">
				<div class="col-md-12">
					<div>
					  <select data-placeholder="Select City" class="chosen-select" tabindex="5">
					      <option value=""></option>
						    {{-- <optgroup label="Finland">
					  		  <option >All</option>    
						      <option>Helsinki</option>
						      <option>Espoo</option>
						      <option>Tampere</option>
						      <option>Vantaa</option>
						      <option>Turku</option>
						      <option>Oulu</option>
						      <option>Lahti</option>
						      <option>Kuopio</option>
						      <option>Jyväskylä</option>
						      <option>Pori</option>
						      <option>Lappeenranta, 	</option>
						      <option>Vaasa</option>
						      <option>Kotka</option>
						      <option>Science</option>
						      <option>History</option>
						      <option>Math</option>
						      <option>Joensuu</option>
						      <option>Hämeenlinna</option>
						      <option>Porvoo</option>
						      <option>Mikkeli</option>
						      <option>Hyvinge</option>
						      <option>Järvenpää</option>
						      <option>Hyvinge</option>
						      <option>Nurmijärvi</option>
						      <option>Rauma</option>
						      <option>Lohja</option>
						      <option>Kokkola</option>
						      <option>Kajaani</option>
						      <option>Rovaniemi</option>
						      <option>Tuusula</option>
						      <option>Kirkkonummi</option>
						      <option>Seinäjoki</option>
						      <option>Kerava</option>
						      <option>Kouvola</option>
						      <option>Imatra</option>
						      <option>Nokia</option>
						      <option>Savonlinna</option>
						      <option>Riihimäki</option>
						      <option>Vihti</option>
						      <option>Salo</option>
						      <option>Kangasala</option>
						    </optgroup> --}}
					  </select>
					</div>
				</div>
			</div>
            <h4 class="section-head"><i class="icon-home"></i> All Categories</h4>
            <div class="row form-group">
            	<div class="col-md-12">
            		<div>
            		  <select data-placeholder="Select Category" class="chosen-select" tabindex="5">
            		    <option value=""></option>
            		    {{-- <optgroup label="Book Categories">
            		      <option>All</option>
            		      <option>Science fiction</option>
            		      <option>Satire</option>
            		      <option>Drama</option>
            		      <option>Action and Adventure</option>
            		      <option>Romance</option>
            		      <option>Mystery</option>
            		      <option>Horror</option>
            		      <option>Self help</option>
            		      <option>Health</option>
            		      <option>Guide</option>
            		      <option>Travel	</option>
            		      <option>Children's</option>
            		      <option>Religion, Spirituality & New Age</option>
            		      <option>Science</option>
            		      <option>History</option>
            		      <option>Math</option>
            		      <option>Anthology</option>
            		      <option>Poetry</option>
            		      <option>Encyclopedias</option>
            		      <option>Dictionaries</option>
            		      <option>Comics</option>
            		      <option>Art</option>
            		      <option>Cookbooks</option>
            		      <option>Diaries</option>
            		      <option>Journals</option>
            		      <option>Prayer books</option>
            		      <option>Series</option>
            		      <option>Trilogy</option>
            		      <option>Biographies</option>
            		      <option>Autobiographies</option>
            		      <option>Fantasy</option>
            		    </optgroup> --}}
            		  </select>
            		</div>
            	</div>
            </div>
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
									<img src="images/Iron.jpg" class="img-responsive">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg" class="img-responsive">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg" class="img-responsive">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg" class="img-responsive">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg" class="img-responsive">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg" class="img-responsive">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg" class="img-responsive">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg" class="img-responsive">
									<p>Product Name</p>
								</div>
								<div class="col-md-4">
									<img src="images/Iron.jpg" class="img-responsive">
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