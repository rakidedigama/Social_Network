@extends('layouts.layout')

@section('pageTitle','View Book')

@section('content')
	
	<div class="fh5co-loader"></div>
	
	<div id="page">
		@include('layouts.nav', ['active' => 'gallery'])
		<div style="padding-top: 40px;"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="p-box-lent col-md-2-cutm">
						
						<div class="book-img-blck ">
							<div class="p-img-al" style="background-image: url('{{ url('/images/uploads/280').'/'.$book->image }}')"></div>
						</div>
						<div class="books-inof">
							<p>{{ $book->name }}</p>
							<p class="person-name"><i class="icon-man"></i> {{ $book->user }} </p>
							<p class="person-name"><i class="icon-location2"></i> {{ $book->city }} </p>
						</div>
						
					</div>
					<div class="view-book-info">
						<p>{{ $book->name }} :</p>
						<p>By: <span>{{ $book->author }}</span></p>
						<p>Lending Duration : 
							@php
								// $days = $book->lending_duration;
								// $weeks = floor($days / 7);
								// $dayRemainder = $days % 7;
								// echo $weeks.' Weeks '.$dayRemainder.' Days';
								echo $book->lending_duration.' Weeks';
							@endphp
						</p>
						<p>Rental Count : {{ $book->rental_count }}</p>
						<p>Requests count : {{ $req_count }}</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="view-book-info">
						<h5>Reviews</h5>
						@foreach ($ratings as $val)
							<select class="rate">
								@for ($i = 1; $i <= 5 ; $i++)
									<option value="{{ $i }}" {{$i===$val->rating?'selected':''}}>{{ $i }}</option>
								@endfor
							</select>
							<p>"{{$val->review}}" - by {{$val->borrower}}</p>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
		<div style="padding-top: 40px;"></div>

@endsection

@section('header')
  <link rel="stylesheet" type="text/css" href="{{ url('/css/css-stars.css') }}">
@endsection

@section('footer')
	<script src="{{url('/js/jquery.barrating.min.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
		});
		// Rating 
	    $('.rate').barrating({
			theme: 'css-stars',
			readonly: true ,
			showSelectedRating: true
	    });
	</script>
@endsection