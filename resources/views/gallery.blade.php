@extends('layouts.layout')

@section('pageTitle','View Book Gallery')

@section('content')
	
	<div class="fh5co-loader"></div>
	
	<div id="page">
		@include('layouts.nav', ['active' => 'gallery'])
		{{--
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
						   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
						   				<div class="slider-text-inner">
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
		--}}
		<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section" style="padding-top: 0px;">
			<div class="cat-lst-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ul class="mega-ul-lst">
								<li><a href="">Biographies</a></li>
								<li><a href="">Business</a></li>
								<li><a href="">Children's</a></li>
								<li><a href="">
									<div class="form-group">
										<div class="">
											<div>
											  <select data-placeholder="All Categories" class="chosen-select" id="sub_category_id" name="sub_category_id" required tabindex="3">
											    <option value=""></option>
											  </select>
											</div>
										</div>
									</div>
								</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">

				<div class="row">
					
					{{-- <div class="col-md-3">
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
				                    <button type="submit" class="btn btn-success" id="searchbtn" tabindex="">Search</button>
				                </div>
				            </div>
						</div>
					</div> --}} 

					<div class="col-md-12">
						<div class="right-side-home">
							<div id="custom-search-input">
	        					<div class="span12">
						        <form id="custom-search-form" class="form-search form-horizontal "> {{--custom-search-form--}}
						            <div class="input-append span12">
						                <input type="text" class="search-query" name="name" id="name" placeholder="Search Books by Title, Neighborhood or Author" value="{{ isset($_GET['name'])?$_GET['name']:'' }}">
						                <button type="submit" class="btn"><i class="icon-search"></i></button>
						            </div>
						        </form>
	    						</div>
							</div>
							<!-- <div class="row">
								<div class="col-md-3">
									<div class="category-book-box">
										<div class="cat-bok">
											<img src="images/book-cat1.jpg" class="img-reponsive">
										</div>
										<div class="cat-lst">
											<a href="" class="cat-main">Biographies</a>
											<ul>
												<li><a href="">Arts & Literature</a></li>
												<li><a href="">Cultural</a></li>
												<li><a href="">European</a></li>
												<li><a href="">Historical</a></li>
												<li><a href="">Leaders & Notable People</a></li>
												<li><a href="">Military</a></li>
												<li><a href="">Modern</a></li>
												<li><a href="">Sports</a></li>
												<li><a href="">Women</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="category-book-box">
										<div class="cat-bok">
											<img src="images/book-cat2.jpg" class="img-reponsive">
										</div>
										<div class="cat-lst">
											<a href="" class="cat-main">Business</a>
											<ul>
												<li><a href="">Careers</a></li>
												<li><a href="">Economics</a></li>
												<li><a href="">Finance</a></li>
												<li><a href="">Industries</a></li>
												<li><a href="">International</a></li>
												<li><a href="">Management</a></li>
												<li><a href="">Marketing</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="category-book-box">
										<div class="cat-bok">
											<img src="images/book-cat3.jpg" class="img-reponsive">
										</div>
										<div class="cat-lst">
											<a href="" class="cat-main">Children's</a>
											<ul>
												<li><a href="">Action & Adventure</a></li>
												<li><a href="">Activity Books</a></li>
												<li><a href="">Animals</a></li>
												<li><a href="">Cars & Trucks</a></li>
												<li><a href="">Classics</a></li>
												<li><a href="">Comedy</a></li>
												<li><a href="">Cookbooks</a></li>
												<li><a href="">Education & Reference</a></li>
												<li><a href="">Fairy Tales</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="category-book-box">
										<div class="cat-bok">
											<img src="images/book-cat4.jpg" class="img-reponsive">
										</div>
										<div class="cat-lst">
											<a href="" class="cat-main">History</a>
											<ul>
												<li><a href="">Ancient</a></li>
												<li><a href="">Asian</a></li>
												<li><a href="">Caribbean</a></li>
												<li><a href="">European</a></li>
												<li><a href="">Exploration</a></li>
												<li><a href="">Medieval</a></li>
												<li><a href="">Modern</a></li>
												<li><a href="">Native</a></li>
												<li><a href="">Religious</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="category-book-box">
										<div class="cat-bok">
											<img src="images/book-cat5.jpg" class="img-reponsive">
										</div>
										<div class="cat-lst">
											<a href="" class="cat-main">Religion & Spirituality</a>
											<ul>
												<li><a href="">Agnosticism</a></li>
												<li><a href="">Astrology</a></li>
												<li><a href="">Atheism</a></li>
												<li><a href="">Buddhism</a></li>
												<li><a href="">Christian</a></li>
												<li><a href="">Christian Living</a></li>
												<li><a href="">Comparative Religion</a></li>
												<li><a href="">Earth-Based Religions</a></li>
												<li><a href="">Hinduism</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="category-book-box">
										<div class="cat-bok">
											<img src="images/book-cat6.jpg" class="img-reponsive">
										</div>
										<div class="cat-lst">
											<a href="" class="cat-main">Self-Help</a>
											<ul>
												<li><a href="">Abuse</a></li>
												<li><a href="">Addictions</a></li>
												<li><a href="">Anger Management</a></li>
												<li><a href="">Death & Grief</a></li>
												<li><a href="">Depression</a></li>
												<li><a href="">Meditation</a></li>
												<li><a href="">Mid-Life</a></li>
												<li><a href="">Motivational</a></li>
												<li><a href="">Personal Transformation</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="category-book-box">
										<div class="cat-bok">
											<img src="images/book-cat7.jpg" class="img-reponsive">
										</div>
										<div class="cat-lst">
											<a href="" class="cat-main">Literature & Fiction</a>
											<ul>
												<li><a href="">Anthologies</a></li>
												<li><a href="">Classics</a></li>
												<li><a href="">Contemporary</a></li>
												<li><a href="">Foreign Language</a></li>
												<li><a href="">History & Criticism</a></li>
												<li><a href="">Poetry</a></li>
												<li><a href="">World Literature</a></li>
												<li><a href="">Crime & Detective</a></li>
												<li><a href="">Mysteries & Conspiracy</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="category-book-box">
										<div class="cat-bok">
											<img src="images/book-cat4.jpg" class="img-reponsive">
										</div>
										<div class="cat-lst">
											<a href="" class="cat-main">Educational Textbooks</a>
											<ul>
												<li><a href="">Arts</a></li>
												<li><a href="">Architecture & Design</a></li>
												<li><a href="">Business & Finance</a></li>
												<li><a href="">Business & Investing</a></li>
												<li><a href="">Computer Science</a></li>
												<li><a href="">Computers & Technology</a></li>
												<li><a href="">Education</a></li>
												<li><a href="">Economics</a></li>
												<li><a href="">History</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div> -->
							<br/>
							{{-- <div class="content" style="height:900px; width: auto;"> --}}
							<div>
								<div class="right-side-home loader-right-side">
									<div class="product-list">
										<div class="row" id="rows">

											@if ( $data['msg'] )
												<div class="row">
													<p class="alert alert-danger text-center">
														{{ $data['msg'] }}
													</p>
												</div>
											@else
												
												@foreach ($data as $value)
													@php 
														$code = $mssg = '';
														if ( $user = Auth::user() ) {
			    	    	        		if ( $value->user_id != $user->id ) {

			    	    	        			$code ='<button type="button" class="btn btn-primary borrow_btn" style="margin-left:28%;" lent_user="'.$value->user_id.'" product_id="'.$value->id.'" mssg_id="message'.$value->id.'" mssg_inner_id="inner-message'.$value->id.'" >Borrow</button>';
			    	    	        			$mssg ='<div id="message'.$value->id.'" style="display: none;">'.
			    	    	        				'<div style="padding: 5px;">'.
                                      '<div id="inner-message'.$value->id.'" class="alert alert-success">'.
                                        '<button type="button" class="close" data_id="message'.$value->id.'" >&times;</button>'.
                                          '<span></span>'.
                                      '</div>'.
                                  '</div>'.
                                '</div>'; 
			    	    	        		}
														}
    	    	        			@endphp

													<div class="col-md-2-cutm">
														<div class="p-box-lent">
															
															<div class="book-img-blck">
																<div class="p-img-al" style="background-image: url('{{ url('/images/uploads').'/1535437568.jpg' }}')" ></div>
															</div>
															<div class="books-inof">
																<p>{{ $value->name }}</p>
																<p class="person-name"><i class="icon-man"></i> {{ $value->owner_name }} </p>
																<p class="person-name"><i class="icon-location2"></i> {{ $value->city }} </p>
															</div>
															<div class="book-hover-btn">
																<?php echo $code ?>
															</div>
															
															<?php echo $mssg ?>
														</div>
													</div> 
												@endforeach

											@endif
											
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="page-nation home-pagina">
                  <?php echo $data->render() ?>
                  {{-- <ul  class="pagination pagination-large">
                  	<li class="disabled"><span><i class="icon-arrow-left"></i> Previous</span></li>
                  	<li class="active"><span>1</span></li>
                  	<li><a href="#">2</a></li>
                  	<li class="disabled"><span>...</span></li>
                  	<li><a rel="next" href="#">Next <i class="icon-arrow-right"></i></a></li>
             		</ul> --}}     		
          			</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('footer')

	<script type="text/javascript">
		$(document).ready(function($) {
		    
		    //data-dismiss="alert"
		    //Alert Message FUNCTION
		    function alertMessage1(msg,behave,id,inner_id) {
	            $('#'+id).hide();
	            if(behave == 'success')
	            {
	                $('#'+inner_id).removeClass('alert-danger');
	                $('#'+inner_id).addClass('alert-success');
	            }
	            else
	            {
	                $('#'+inner_id).removeClass('alert-success');
	                $('#'+inner_id).addClass('alert-danger');
	            }

	            $('#'+inner_id).find('span').html(msg);
	            $('#'+id).show().delay(6000).fadeOut();
	        }
		    
		    //Products Height Code
	        $.fn.equalHeights = function() {
                var maxHeight = 0,
                    $this = $(this);
        
                $this.each( function() {
                	console.log('loop');
                    var height = $(this).innerHeight();
        
                    if ( height > maxHeight ) { maxHeight = height; }
                });
        
                return $this.css('height', maxHeight);
            };                
            $('.p-box-lent').equalHeights();

			{{--
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
	                    url: '{{ route('categories') }}',
	                    type: 'GET',
	                    cache: true,
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
						url: '{{ route('countries') }}',
						type: 'GET',
						cache: true,
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
			--}}

			$(document).on('click','.close', function(e) {
				e.preventDefault();
				var id = $(this).attr('data_id');
				$('#'+id).hide();
			});

			{{-- 
				function loadData(reset,skip,limit,name){
	                $.ajax({
	                    url: '{{ url('products/') }}/'+skip+'/'+limit+'/'+name,
	                    dataType: 'JSON',
	                    cache: true,
	                    beforeSend: function () {
	                    	$('.loader-right-side').append('<div class="col-loader-img">'+
			            		'<img src="{{ url('/images/loader.gif') }}" class="img-circle center-block loader" height="50" width="50" >'+
			        		'</div>');
	                    },
	                    success:function(data){
	                    	if(data['msg']) {
	                    		$('.loader').parent('div').remove();
	                    	
	                    		if( data['searched']==1 )
	                    			$('#rows').html('');

	                			$('#rows').append('<div class="col-md-12">'+
	                				'<p class="text text-danger center-block">'+data['msg']+'</p>'+
	            				'</div>');
	                    	}
	                    	else {
		                    	if(reset == 1)
		                    		$('#rows').html('');

		                        $.each(data,function(index, value) {
		                        	var code = '',
		                        	    mssg = '';
		                        	@if( $user = Auth::user() )
		    	    	        		if( value['user_id'] != {{$user->id}} )
		    	    	        		{
		    	    	        			code ='<button type="button" class="btn btn-primary borrow_btn" style="margin-left:28%;" lent_user="'+value['user_id']+'" product_id="'+value['id']+'" mssg_id="message'+value['id']+'" mssg_inner_id="inner-message'+value['id']+'" >Borrow</button>';
		    	    	        			mssg ='<div id="message'+value['id']+'" style="display: none;">'+
	                                            '<div style="padding: 5px;">'+
	                                                '<div id="inner-message'+value['id']+'" class="alert alert-success">'+
	                                                    '<button type="button" class="close" data_id="message'+value['id']+'" >&times;</button>'+
	                                                    '<span></span>'+
	                                                '</div>'+
	                                            '</div>'+
	                                        '</div>'; 
		    	    	        		}
	    	    	        		@endif

		                            $('#rows').append('<div class="col-md-3">'+
		                                '<div class="p-box-lent">'+
		                                	'<p class="person-name"><i class="icon-man"></i> '+value['owner_name']+'</p>'+
		                                    '<p class="person-name"><i class="icon-location2"></i> '+value['city']+'</p>'+
		                                    '<div class="p-img-al" style=\"background-image: url(\'{{ url('/images/uploads') }}/'+value['image']+'\')\"></div>'+
		                                    '<p>'+value['name']+'</p>'+
		                                    code+
		                                    mssg+
		                                '</div>'+
		                            '</div>'); 
		                            
		                        });
	                            $.fn.equalHeights = function() {
	                                var maxHeight = 0,
	                                    $this = $(this);
	                        
	                                $this.each( function() {
	                                	console.log('loop');
	                                    var height = $(this).innerHeight();
	                        
	                                    if ( height > maxHeight ) { maxHeight = height; }
	                                });
	                        
	                                return $this.css('height', maxHeight);
	                            };

	                            // auto-initialize plugin
	                            $('[data-equal]').each(function(){
	                            	console.log('another loop');
	                                var $this  = $(this),
	                                    target = $this.data('equal');
	                                $this.find(target).equalHeights();
	                            });
	                            $('.p-box-lent').equalHeights();
		                        
	                    	}
	                    },
	                    error: function (){ 
	                    	// $('.loader').parent('div').remove(); 
	                    },
	                    complete : function () {
	                    	$('.loader').parent('div').remove();
	                    }
	                }); 
	            }            

			--}}
            
            {{-- 
	            var name = "null";
	    		// loadData(0,0,12,name);
	    
	            $('.custom-search-form').submit(function(e) {
	                e.preventDefault();
	        		name = $('#name').val();

	        		if(name=='')
	        			name="null";

	        		loadData(1,0,12,name);
	            });
            --}}

            $(document).on('click','.borrow_btn',function(e) {
            	var lent_user        = $(this).attr('lent_user'),
            		product_id       = $(this).attr('product_id'),
            		mssg_id          = $(this).attr('mssg_id'),
            		mssg_inner_id    = $(this).attr('mssg_inner_id'),
            		borrowBtn        = $(this);

        		$.ajax({
        			url: '{{ route('reqborrow') }}',
        			type: 'POST',
        			cache: true,
        			dataType: 'JSON',
        			data: {_token: '{{ csrf_token() }}',lent_user:lent_user,product_id:product_id },
        			success:function(data){
        				if( data["inserted"] == "true" )
        				{
    						alertMessage1('Request Sent .','success',mssg_id,mssg_inner_id);
    						borrowBtn.remove();
        				}
        				else if ( data["error"] )
        				{
        					alertMessage1(data["error"],'error',mssg_id,mssg_inner_id);
        				    borrowBtn.remove();
        				}
        				else if ( data["errorr"] )
        					alertMessage1(data["errorr"],'error',mssg_id,mssg_inner_id);
    					else
    						alertMessage1('Error occured while Borrowing request.','error',mssg_id,mssg_inner_id);
        			},
        			error:function(){ alertMessage1('Error occured while Borrowing request.','error',mssg_id,mssg_inner_id); }
        		});
            });

			{{--
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
					     	loadData(0,n,3,name);
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
			--}}
		});
	</script>
@endsection