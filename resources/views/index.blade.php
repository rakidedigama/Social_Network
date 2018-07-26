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
					  <select data-placeholder="Select City" id="city_id" class="chosen-select" tabindex="5">
					      <option value=""></option>
					  </select>
					</div>
				</div>
			</div>
            <h4 class="section-head"><i class="icon-home"></i> All Categories</h4>
            <div class="row form-group">
            	<div class="col-md-12">
            		<div>
            		  <select data-placeholder="Select Category" id="sub_category_id" class="chosen-select" tabindex="5">
            		    <option value=""></option>
            		  </select>
            		</div>
            	</div>
            </div>

            <div class="row form-group">
                <div class="col-md-12 btn-center">
                    <button type="button" class="btn btn-success" id="searchbtn" tabindex="">Search</button>
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
				                <input type="text" class="search-query" id="name" placeholder="Search">
				                <button type="button" class="btn"><i class="icon-search"></i></button>
				            </div>
				        </form>
      				</div>
						</div>
						<br/>
						<div class="content" style="height:900px; width: auto;">
							<div class="right-side-home">
								<div class="product-list">
									<div class="row" id="rows">
									</div>
								</div>
							</div>
						</div>
					</div>
							{{-- <div class="row">
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
							</div> --}}
			</div>
		</div>
	</div>

	</div>

@endsection

@section('footer')
	<script type="text/javascript">
		$(document).ready(function($) {
			function loadSubCategories(data)
            {
                var rows = '';
                $.each(data,function(index, value) {
                    rows += '<option value="'+value['id']+'">'+value['name']+'</option>';
                });
                return rows;
            }
            function loadCategories()
            {
                $.ajax({
                    url: '/categories',
                    type: 'GET',
                    dataType: 'JSON',
                    success:function(data){
                        var sub_category_id = $('#sub_category_id');
                        sub_category_id.chosen('destroy');
                        sub_category_id.empty();
                        sub_category_id.append('<option value="">All</option>');

                        $.each(data,function(index, value) {
                            sub_category_id.append('<optgroup label="'+index+'">'+loadSubCategories(value)+'</optgroup>'); 
                        });
                        sub_category_id.chosen();
                    },
                    error:function(){}
                }); 
            }
            loadCategories();

            function loadCities(data)
			{
				var rows = '';
				$.each(data,function(index, value) {
					rows += '<option value="'+value['id']+'">'+value['name']+'</option>';
				});
				return rows;
			}
			function loadCountries()
			{
				$.ajax({
					url: '/countries',
					type: 'GET',
					dataType: 'JSON',
					success:function(data){
						var city_id = $('#city_id');
						city_id.chosen('destroy');
						city_id.empty();
						city_id.append('<option value="">All</option>');

						$.each(data,function(index, value) {
							city_id.append('<optgroup label="'+index+'">'+loadCities(value)+'</optgroup>');	
						});
						city_id.chosen();
						@if ( old('city_id') )
							$('#city_id').val('{{old('city_id')}}').trigger('chosen:updated');
						@endif
					},
					error:function(){}
				});	
			}
			loadCountries();


			function loadData(reset,skip,limit,city_id,sub_category_id,name)
            {
            	$('#rows').append('<img src="/images/loader.gif" class="img-circle center-block loader" height="50" width="50" >');
                $.ajax({
                    url: '/products/'+skip+'/'+limit+'/'+city_id+'/'+sub_category_id+'/'+name,
                    dataType: 'JSON',
                    success:function(data){
                    	if(data['msg'])
                    	{
                    		$('.loader').remove();
                    	
                    		if( data['searched']==1 )
                    			$('#rows').html('');

                			$('#rows').append('<div class="col-md-12">'+
                				'<p class="text text-danger center-block">'+data['msg']+'</p>'+
            				'</div>');

                    	}
                    	else
                    	{
	                    	if(reset == 1)
	                    		$('#rows').html('');

	                        $.each(data,function(index, value) {
	                            $('#rows').append('<div class="col-md-4">'+
	                                '<div class="p-box-lent">'+
	                                    '<p class="person-name">Category: '+value['category_name']+'</p>'+
	                                    '<img src="/images/uploads/'+value['image']+'" class="img-responsive">'+
	                                    '<p>'+value['name']+'</p>'+
	                                '</div>'+
	                            '</div>'); 
	                        });
	                        $('.loader').remove();
                    	}
                    },
                    error:function(){ $('.loader').remove(); }
                }); 
            }            
            
            var city_id = "''",
        		sub_category_id = "''",
        		name = "null";

    		loadData(0,0,12,city_id,sub_category_id,name);

            $('#searchbtn').click(function(e) {
            	city_id = $('#city_id').val();
        		sub_category_id = $('#sub_category_id').val();
        		name = $('#name').val();

        		if(city_id=='')
        			city_id = "''";
        		if(sub_category_id=='')
        			sub_category_id="''";
        		if(name=='')
        			name="null";

        		loadData(1,0,12,city_id,sub_category_id,name);
            });

			$(".content").mCustomScrollbar({
				scrollButtons:{
					enable:true
				},
				callbacks:{
					onScrollStart:function(){ myCallback(this,"#onScrollStart") },
					onScroll:function(){ myCallback(this,"#onScroll") },
					onTotalScroll:function(){ 
						myCallback(this,"#onTotalScroll");
						var n = $('#rows').children().length;
				     	loadData(0,n,3,city_id,sub_category_id,name);
						},
					onTotalScrollOffset:60,
					onTotalScrollBack:function(){ myCallback(this,"#onTotalScrollBack") },
					onTotalScrollBackOffset:50,
					whileScrolling:function(){ 
						myCallback(this,"#whileScrolling"); 
						$("#mcs-top").text(this.mcs.top);
						$("#mcs-dragger-top").text(this.mcs.draggerTop);
						$("#mcs-top-pct").text(this.mcs.topPct+"%");
						$("#mcs-direction").text(this.mcs.direction);
						$("#mcs-total-scroll-offset").text("60");
						$("#mcs-total-scroll-back-offset").text("50");
					},
					alwaysTriggerOffsets:false
				}
			});
			
			function myCallback(el,id){
				if($(id).css("opacity")<1){return;}
				var span=$(id).find("span");
				clearTimeout(timeout);
				span.addClass("on");
				var timeout=setTimeout(function(){span.removeClass("on")},350);
			}
			
			$(".callbacks a").click(function(e){
				e.preventDefault();
				$(this).parent().toggleClass("off");
				if($(e.target).parent().attr("id")==="alwaysTriggerOffsets"){
					var opts=$(".content").data("mCS").opt;
					if(opts.callbacks.alwaysTriggerOffsets){
						opts.callbacks.alwaysTriggerOffsets=false;
					}else{
						opts.callbacks.alwaysTriggerOffsets=true;
					}
				}
			});
		});
	</script>
@endsection