@extends('layouts.layout')

@section('pageTitle','Register')

@section('content')

	<div class="fh5co-loader"></div>
	
	<div id="page">
		@include('layouts.nav', ['some' => 'data'])
	<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section" style="background-image: url(images/BoysWithPhone.jpg);">
		<div class="container">
			<div class="row">
				<div class="login-box sign-box">
					<h3>REGISTRATION FORM</h3>
					<form method="post">
						{{ csrf_field() }}
						<div class="row form-group">
							<div class="col-md-12">
								<label for="username">User Name</label>
								<input type="text" id="username" name="username" class="form-control" required placeholder="UserName">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 ">
								<label for="fname">First Name</label>
								<input type="text" id="fname" name="fname" class="form-control" required placeholder="John">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 ">
								<label for="lname">Last Name</label>
								<input type="text" id="lname" name="lname" class="form-control" placeholder="Jhon">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 ">
								<label for="password">Password</label>
								<input type="password" id="password" name="password" class="form-control" required placeholder="***********">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 ">
								<label for="cpassword">Confirm Password</label>
								<input type="password" id="cpassword" name="password_confirmation" class="form-control" required placeholder="***********">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 ">
								<label for="email">Email</label>
								<input type="email" id="email" name="email" class="form-control" required placeholder="Your email here">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-6 ">
								<label for="country">Country</label>
								<input type="text" id="country" name="country" class="form-control" required placeholder="Your Country">
							</div>
							<div class="col-md-6 ">
								<label for="city">City/Town</label>
								<input type="text" id="city" name="city" class="form-control" required placeholder="Your City / Town">
							</div>
						</div>
						<ul>
							<li><label>Gender</label></li>
							<li>
								<div class="radio checkbox-danger">
					              <input type="radio" id="male" required value="male" name="gender">
					              <label for="male">
					                  Male
					              </label>
					            </div>
							</li>
							<li><label>OR</label></li>
							<li>
								<div class="radio checkbox-danger">
					              <input type="radio" id="female" value="female" name="gender">
					              <label for="female">
					                  Female
					              </label>
					            </div>
							</li>
						</ul>
						<div class="checkbox checkbox-danger">
			              <input id="agreeTrem" name="agreeTrem" type="checkbox" required>
			              <label for="agreeTrem">
			                  I accepted terms and conditions
			              </label>
			            </div>
			            <div class="row form-group">
			            	<div class="col-md-12 btn-center">
			            		<button type="submit" class="btn btn-login">REGISTER</button>
			            	</div>
			            </div>
					</form>
				</div>		
		</div>
	</div>

	</div>
@endsection

@section('footer')
	<script type="text/javascript">
		$(document).ready(function($) {
			
		});
	</script>
@endsection