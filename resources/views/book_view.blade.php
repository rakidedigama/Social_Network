@extends('layouts.layout')

@section('pageTitle','View Book')

@section('content')
	
	<div class="fh5co-loader"></div>
	
	<div id="page">
		@include('layouts.nav', ['active' => 'gallery'])
		<div style="padding-top: 40px;"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
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
						<p>{{ $book->name }}</p>
						<p>By: <span>{{ $book->author }}</span></p>
						<p>Lending Duration : 2 weeks</p>
						<p>Rental Count : {{ $book->rental_count }}</p>
						<p>Requests count : {{ $rr }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div style="padding-top: 40px;"></div>

@endsection

@section('footer')
	<script type="text/javascript">
		$(document).ready(function($) {
		});
	</script>
@endsection