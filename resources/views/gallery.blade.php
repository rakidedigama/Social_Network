@extends('layouts.layout')

@section('pageTitle','Book Gallery')

@section('content')
	
	<div class="fh5co-loader"></div>
	
	<div id="page">
		@include('layouts.nav', ['active' => 'gallery'])
		<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section" style="padding-top: 0px;">
			<div class="container-fluid">
					<div class="row">
							<div class="col-md-12" style="margin-top: 10px;>
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
							</div>
					</div>
			</div>
			<div class="cat-lst-bg">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<ul class="mega-ul-lst" id="cids">
								@foreach ($categories as $val)                  
									<?php  $cclass = ''; ?>
									@if ( isset( $_GET['category_id'] ) && $_GET['category_id'] != NULL )
										@php
											if ( $val['id'] == $_GET['category_id'] )
												$cclass = 'active';
											else
												$cclass = '';
										@endphp
									@endif
									<li><a href="#" cid="{{ $val['id'] }}" class="{{ $cclass!=''?$cclass:'' }}" >{{ $val['name'] }}</a></li>  
								@endforeach
								<li>
									<div class="form-group">
										<div class="">
											<div>
												<select data-placeholder="All Categories" class="chosen-select" id="sub_category_id" name="sub_category_id" >
													<option value=""></option>
												</select>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						<div class="right-side-home">
							<br/>
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
														$code = '';
														if ( $user = Auth::user() ) {
															if ( $value->user_id != $user->id ) {

																$code ='<button type="button" class="btn btn-primary borrow_btn" style="margin-left:28%;" lent_user="'.$value->user_id.'" product_id="'.$value->id.'">Borrow</button>'; 
															}
														}
													@endphp

													<div class="col-md-2-cutm">
														<div class="p-box-lent">
															<a href="{{ route('viewBook',$value->id) }}">
																<div class="book-img-blck">
																	<div class="p-img-al" style="background-image: url('{{ url('/images/uploads/280').'/'.$value->image }}')" ></div>
																</div>
															</a>
															<div class="books-inof">
																<p>{{ $value->name }}</p>
																<a href="{{ route('profile',$value->user_id) }}">
																	<p class="person-name"><i class="icon-man"></i> {{ $value->owner_name }} </p>
																</a>
																<p class="person-name"><i class="icon-location"></i> {{ $value->city }} </p>
															</div>
															<div class="book-hover-btn">
																<?php echo $code ?>
															</div>
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
			
			function loadSubCategories(data) {
					var rows = '';
					$.each(data,function(index, value) {
							rows += '<option value="'+value['id']+'">'+value['name']+'</option>';
					});
					return rows;
			}
			function loadCategories () {
				$.ajax({
						url: '{{ route('categories') }}',
						type: 'GET',
						cache: true,
						dataType: 'JSON',
						success:function(data){
								var sub_category_id = $('#sub_category_id');
								sub_category_id.chosen('destroy');
								sub_category_id.empty();
								sub_category_id.append('<option value="">Select Category</option>');

								$.each(data,function(index, value) {
										sub_category_id.append('<optgroup label="'+index+'">'+loadSubCategories(value)+'</optgroup>'); 
								});
								sub_category_id.chosen();

								@if ( isset( $_GET['sub_category_id'] ) && $_GET['sub_category_id'] != NULL  )
									$('#sub_category_id').val(<?php echo $_GET['sub_category_id'] ?>).trigger('chosen:updated');
								@endif
						},
						error:function(){}
				}); 
			}
			loadCategories();

			@if ( isset($_GET['category_id']) && $_GET['category_id'] != NULL )
				var cid = <?php echo $_GET['category_id'] ?>;
				// $('#cids a').children('a').parent('li').addClass('active');
			@else
				var cid = '';
			@endif

			$('#cids a').click(function(e) {
				e.preventDefault();
				cid = $(this).attr('cid');
				$('#custom-search-form').trigger('submit');
			});

			$('#sub_category_id').change(function(event) {
				cid = '';
				$('#custom-search-form').trigger('submit');
			});

			$('#custom-search-form').submit(function(e) {
				e.preventDefault();
				var name = $('#name').val(),
						s_id = $('#sub_category_id').val();

				if ( cid != '' && cid != null )
					location.assign('{{ route('gallery') }}?name='+name+'&category_id='+cid);
				else
					location.assign('{{ route('gallery') }}?name='+name+'&sub_category_id='+s_id);
			});

			$(document).on('click','.borrow_btn',function(e) {
				var lent_user = $(this).attr('lent_user'),
					product_id = $(this).attr('product_id'),
          borrowBtn = $(this);

				$.ajax({
					url: '{{ route('reqborrow') }}',
					type: 'POST',
					cache: true,
					dataType: 'JSON',
					data: {_token: '{{ csrf_token() }}',lent_user:lent_user,product_id:product_id },
          beforeSend:function(){
            borrowBtn.attr('disabled','disabled');
          },
					success:function(data){
						if( data['error'] ) {
              calert(data['error'],'error');
              borrowBtn.removeAttr('disabled');
            }
            else if( data["inserted"] == "true" ) {
							calert('Request Sent.','success');
							borrowBtn.remove();
						}
						else {
							calert('Error occured while sending request.','error');
              borrowBtn.removeAttr('disabled');
            }
					},
					error:function() { 
						calert('Error occured while sending request.','error');
            borrowBtn.removeAttr('disabled');
					}
				});
			});
		});
	</script>
@endsection