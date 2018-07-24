@extends('layouts.layout')

@section('pageTitle','Register')

@section('content')

	<div class="fh5co-loader"></div>
	
	<div id="page">
		@include('layouts.nav', ['active' => 'register'])
	<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section" style="background-image: url(images/BoysWithPhone.jpg);">
		<div class="container">
			<div class="row">
				<div class="login-box sign-box">
					<h3>REGISTRATION FORM</h3>
					<form method="post" action="{{ route('register') }}">
						{{ csrf_field() }}
						<div class="row form-group">
							<div class="col-md-12 {{ $errors->has('name')?'has-error':'' }}">
								<label for="name">First Name</label>
								<input type="text" id="name" name="name" class="form-control" required placeholder="John" tabindex="1" value="{{old('name')}}">

								@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
	
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 {{ $errors->has('lname')?'has-error':'' }}">
								<label for="lname">Last Name</label>
								<input type="text" id="lname" name="lname" class="form-control" placeholder="Jhon" tabindex="2" value="{{old('lname')}}">
								@if ($errors->has('lname'))
									<span class="help-block">
										<strong>{{ $errors->first('lname') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 {{ $errors->has('password')?'has-error':'' }}">
								<label for="password">Password</label>
								<input type="password" id="password" name="password" class="form-control" required placeholder="***********" tabindex="3">
								@if ($errors->has('password'))
									<span class="help-block">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 ">
								<label for="cpassword">Confirm Password</label>
								<input type="password" id="cpassword" name="password_confirmation" class="form-control" required placeholder="***********" tabindex="4">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 {{ $errors->has('email')?'has-error':'' }}">
								<label for="email">Email</label>
								<input type="email" id="email" name="email" class="form-control" required placeholder="Your email here" tabindex="5" value="{{old('email')}}">
								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 {{ $errors->has('phone')?'has-error':'' }}">
								<label for="phone">Phone</label>
								<input type="text" id="phone" name="phone" class="form-control" required placeholder="3589XXXXXX" pattern="3589[\d*]{6}" title="3589XXXXXX" maxlength="10" minlength="10" tabindex="6" value="{{old('phone')}}">
								@if ($errors->has('phone'))
									<span class="help-block">
										<strong>{{ $errors->first('phone') }}</strong>
									</span>
								@endif
							</div>
						</div>						
						<div class="row form-group">
							<div class="col-md-12 {{ $errors->has('city_id')?'has-error':'' }}">
								<label for="city_id">City/Town</label>
								<select data-placeholder="Select City" class="chosen-select" id="city_id" name="city_id" tabindex="7">
						      		<option value=""></option>
								    {{-- <optgroup label="Finland">
								      <option>All</option>
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
						  		@if ($errors->has('city_id'))
									<span class="help-block">
										<strong>{{ $errors->first('city_id') }}</strong>
									</span>
								@endif
					  		</div>
						</div>
						
						<ul class="{{ $errors->has('gender')?'has-error':'' }}">
							<li><label>Gender</label></li>
							<li>
								<div class="radio checkbox-danger">
					              <input type="radio" id="male" required value="male" name="gender" tabindex="8" {{ old('gender')=='male'? 'checked' : '' }}>
					              <label for="male">
					                  Male
					              </label>
					            </div>
							</li>
							<li><label>OR</label></li>
							<li>
								<div class="radio checkbox-danger">
					              <input type="radio" id="female" value="female" name="gender" tabindex="9" {{ old('gender')=='female'? 'checked' : '' }}>
					              <label for="female">
					                  Female
					              </label>
					            </div>
							</li>
							@if ($errors->has('gender'))
								<span class="help-block">
									<strong>{{ $errors->first('gender') }}</strong>
								</span>
							@endif
						</ul>
						<div class="checkbox checkbox-danger {{ $errors->has('agreeterm')?'has-error':'' }}">
			              <input id="agreeterm" name="agreeterm" type="checkbox" required tabindex="10">
			              <label for="agreeterm">
			                  I accepted terms and conditions
			              </label>

					  		@if ($errors->has('agreeterm'))
								<span class="help-block">
									<strong>{{ $errors->first('agreeterm') }}</strong>
								</span>
							@endif

			            </div>

			            <div class="row form-group">
			            	<div class="col-md-12 btn-center">
			            		<button type="submit" class="btn btn-login" tabindex="11">REGISTER</button>
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
						city_id.append('<option value=""></option>');

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
						
			{{--@if (old('gender') == 'male') 
				$('#male').prop('checked', 'checked');
			@elseif ( old('gender') == 'female' )
				$('#female').prop('checked', 'checked');
			@endif --}}

		});
	</script>
@endsection