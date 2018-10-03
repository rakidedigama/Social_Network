@extends('layouts.layout')

@section('pageTitle','User Profile')

@section('content')

@include('layouts.nav', ['active' => 'gallery'])
<div class="container">
	<div class="row">
		<div style="padding-top: 40px"></div>
		<div class="col-md-12">
			<h3 class="profile-title">{{ $user->name }}’s books</h3>
		</div>
		<div class="col-md-3">
			<div class="pro-dash-img" id="img-upload-bg" style="background-image: url('{{ url('/images/uploads/users/200').'/'.$user->pimage }}') "  >
			</div>
			<div class="profile-info-box">
			    <p>User Personal details</p>
			    <ul>
		            <li>
		                <p><i class="icon-man"></i> <span>{{ $user->name.' '.$user->total_products }} 
		                <i class="icon-drop-up-arrow size-13 green-color"></i> {{ $user->up_points }} <i class="icon-drop-down-arrow size-13 brown-color"></i> {{ $user->down_points }} </span></p>
		            </li>
		            <li>
		                <p><i class="icon-location"></i> <span>{{ $user->city }}</span></p>
		            </li>
		            @if($isLended)
			            <li>
			            	<p><i class="icon-email"></i><span>{{ $user->email }}</span></p>
			            </li>
			            <li>
			            	<p><i class="icon-phone"></i><span>{{ $user->phone }}</span></p>
			            </li>
		            @endif
			    </ul>
			</div>
		</div>
		<div class="col-md-9">
	    <div class="content" style="max-height: 900px; width: auto;">
	    <div class="right-side-home">
	        <div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="right-side-home">
							{{-- <div class="content" style="height:900px; width: auto;"> --}}
							<div>
								<div class="right-side-home loader-right-side">
									<div class="product-list" style="padding-top: 0px">
										<div class="row" id="rows">

											@if ( $books['msg'] )
												<div class="row">
													<p class="alert alert-danger text-center">
														{{ $books['msg'] }}
													</p>
												</div>
											@else
												@foreach ($books as $value)
													<div class="col-md-3">
														<div class="p-box-lent">
																<div class="book-img-blck">
																	<div class="p-img-al" style="background-image: url('{{ url('/images/uploads/280').'/'.$value->image }}')" ></div>
																</div>
															<div class="books-inof">
																<p>{{ $value->name }}</p>
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
	            	  <?php echo $books->render() ?>     		
	        			</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	    </div>
		</div>
		</div>
		<div style="padding-top: 40px"></div>

	</div>
</div>
@endsection

@section('footer')
	<script type="text/javascript">
		$(document).ready(function(){

		})
	</script>
@endsection
