@extends('layouts.layout')

@section('pageTitle','Login')

@section('content')
	
	<div class="fh5co-loader"></div>
	
	<div id="page">
		@include('layouts.nav', ['some' => 'data'])
	<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section" style="background-image: url({{ url('/images/BoysWithPhone.jpg') }});">
		<div class="container">
			<div class="row">
				<div class="login-box">
					<h3>LOGIN FORM</h3>
					<form>
						{{ csrf_field() }}
						<div class="row form-group">
							<div class="col-md-12">
								<label for="username">User Name</label>
								<input type="text" id="username" name="username" class="form-control" required placeholder="User Name">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 ">
								<label for="password">Password</label>
								<input type="password" id="password" name="password" class="form-control" required placeholder="Password">
							</div>
						</div>
						<div class="checkbox checkbox-danger">
              <input type="checkbox" id="checkbox4" name="remember" {{ old('remember') ? 'checked' : '' }} >
              <label for="checkbox4">
                  Keep me signed in
              </label>
            </div>
            <div class="row form-group">
            	<div class="col-md-12 btn-center">
            		<button type="submit" class="btn btn-login">SIGN IN</button>
            	</div>
            </div>
            <div class="row form-group">
            	<div class="col-md-6">
            		<a href="{{ route('password.request') }}" class="forget-pas">Forget Password?</a>
            	</div>
            	<div class="col-md-6">
            		<a href="{{ route('register') }}" class="creat-Ac">Creat new Account</a>
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