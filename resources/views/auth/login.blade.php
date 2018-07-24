@extends('layouts.layout')

@section('pageTitle','Login')

@section('content')
	
	<div class="fh5co-loader"></div>
	
	<div id="page">
		@include('layouts.nav', ['active' => 'login'])
	<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section" style="background-image: url({{ url('/images/BoysWithPhone.jpg') }});">
		<div class="container">
			<div class="row">
				<div class="login-box">
					<h3>LOGIN FORM</h3>
					<form method="post" action="{{ route('login') }}">
						{{ csrf_field() }}
						<div class="row form-group">
							<div class="col-md-12 {{ $errors->has('email')?'has-error':'' }}">
								<label for="email">Email</label>
								<input type="email" id="email" name="email" class="form-control" required placeholder="User Name" value="{{ old('email') }}" autofocus>
								@if ($errors->has('email'))
									<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 {{ $errors->has('password')?'has-error':'' }}">
								<label for="password">Password</label>
								<input type="password" id="password" name="password" class="form-control" required placeholder="Password">

								@if ($errors->has('password'))
									<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
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